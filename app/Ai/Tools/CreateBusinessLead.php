<?php

namespace App\Ai\Tools;

use App\Models\AiLead;
use App\Models\AiVisitor;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Validator;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class CreateBusinessLead implements Tool
{
    public function __construct(
        private readonly AiVisitor $visitor,
        private readonly string $requestToken,
        private readonly ?string $pageUrl = null
    ) {
    }

    public function description(): Stringable|string
    {
        return 'Create a GPT Group partnership, vendor, B2B, product, support, career or general enquiry. Only use this tool after the visitor provides their name, requirement, and at least one contact method: phone or email.';
    }

    public function handle(Request $request): Stringable|string
    {
        $data = [
            'name' => trim((string) ($request['name'] ?? '')),
            'email' => trim((string) ($request['email'] ?? '')),
            'phone' => trim((string) ($request['phone'] ?? '')),
            'company_name' => trim(
                (string) ($request['company_name'] ?? '')
            ),
            'business_type' => trim(
                (string) ($request['business_type'] ?? '')
            ),
            'location' => trim(
                (string) ($request['location'] ?? '')
            ),
            'lead_type' => trim(
                (string) ($request['lead_type'] ?? 'general')
            ),
            'requirement' => trim(
                (string) ($request['requirement'] ?? '')
            ),
        ];

        $validator = Validator::make($data, [
            'name' => [
                'required',
                'string',
                'max:150',
            ],
            'email' => [
                'nullable',
                'email',
                'max:190',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],
            'company_name' => [
                'nullable',
                'string',
                'max:190',
            ],
            'business_type' => [
                'nullable',
                'string',
                'max:150',
            ],
            'location' => [
                'nullable',
                'string',
                'max:190',
            ],
            'lead_type' => [
                'required',
                'in:partnership,vendor,b2b,product,support,career,general',
            ],
            'requirement' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        if ($validator->fails()) {
            return json_encode([
                'success' => false,
                'message' => 'Some enquiry details are invalid.',
                'errors' => $validator->errors()->toArray(),
            ], JSON_UNESCAPED_UNICODE);
        }

        $validated = $validator->validated();

        $email = $validated['email'] ?: null;
        $phone = $validated['phone'] ?: null;

        if (!$email && !$phone) {
            return json_encode([
                'success' => false,
                'message' => 'Phone number or email address is required.',
                'missing_fields' => [
                    'phone_or_email',
                ],
            ], JSON_UNESCAPED_UNICODE);
        }

        $duplicate = AiLead::query()
            ->where('ai_visitor_id', $this->visitor->id)
            ->where('lead_type', $validated['lead_type'])
            ->where('created_at', '>=', now()->subMinutes(15))
            ->where(function ($query) use ($email, $phone) {
                if ($email) {
                    $query->orWhere('email', $email);
                }

                if ($phone) {
                    $query->orWhere('phone', $phone);
                }
            })
            ->first();

        if ($duplicate) {
            return json_encode([
                'success' => true,
                'duplicate' => true,
                'reference' => $this->reference($duplicate->id),
                'message' => 'This enquiry has already been received.',
            ], JSON_UNESCAPED_UNICODE);
        }

        $lead = AiLead::create([
            'ai_visitor_id' => $this->visitor->id,
            'request_token' => $this->requestToken,
            'name' => $validated['name'],
            'email' => $email,
            'phone' => $phone,
            'company_name' =>
                $validated['company_name'] ?: null,
            'business_type' =>
                $validated['business_type'] ?: null,
            'location' =>
                $validated['location'] ?: null,
            'lead_type' => $validated['lead_type'],
            'requirement' => $validated['requirement'],
            'status' => 'new',
            'priority' => $this->resolvePriority(
                $validated['requirement']
            ),
            'metadata' => [
                'source' => 'gpt-groups-ai-agent',
                'page_url' => $this->pageUrl,
            ],
        ]);

        $this->visitor->update([
            'name' => $validated['name'],
            'email' => $email ?: $this->visitor->email,
            'phone' => $phone ?: $this->visitor->phone,
        ]);

        return json_encode([
            'success' => true,
            'reference' => $this->reference($lead->id),
            'message' => 'The enquiry has been submitted successfully.',
        ], JSON_UNESCAPED_UNICODE);
    }

    // public function schema(JsonSchema $schema): array
    // {
    //     return [
    //         'name' => $schema
    //             ->string()
    //             ->description('Visitor full name.')
    //             ->required(),

    //         'email' => $schema
    //             ->string()
    //             ->description(
    //                 'Visitor email address. Empty string when unavailable.'
    //             ),

    //         'phone' => $schema
    //             ->string()
    //             ->description(
    //                 'Visitor phone number. Empty string when unavailable.'
    //             ),

    //         'company_name' => $schema
    //             ->string()
    //             ->description(
    //                 'Visitor company name. Empty string when unavailable.'
    //             ),

    //         'business_type' => $schema
    //             ->string()
    //             ->description(
    //                 'Visitor business type. Empty string when unavailable.'
    //             ),

    //         'location' => $schema
    //             ->string()
    //             ->description(
    //                 'Visitor city, region or country. Empty string when unavailable.'
    //             ),

    //         'lead_type' => $schema
    //             ->string()
    //             ->enum([
    //                 'partnership',
    //                 'vendor',
    //                 'b2b',
    //                 'product',
    //                 'support',
    //                 'career',
    //                 'general',
    //             ])
    //             ->required(),

    //         'requirement' => $schema
    //             ->string()
    //             ->description(
    //                 'Complete visitor requirement.'
    //             )
    //             ->required(),
    //     ];
    // }

  


    public function schema(JsonSchema $schema): array
{
    return [
        'name' => $schema
            ->string()
            ->description('Visitor full name.')
            ->required(),

        'email' => $schema
            ->string()
            ->description(
                'Visitor email address. Use an empty string when unavailable.'
            )
            ->required(),

        'phone' => $schema
            ->string()
            ->description(
                'Visitor phone number. Use an empty string when unavailable.'
            )
            ->required(),

        'company_name' => $schema
            ->string()
            ->description(
                'Visitor company name. Use an empty string when unavailable.'
            )
            ->required(),

        'business_type' => $schema
            ->string()
            ->description(
                'Visitor business type. Use an empty string when unavailable.'
            )
            ->required(),

        'location' => $schema
            ->string()
            ->description(
                'Visitor city, region or country. Use an empty string when unavailable.'
            )
            ->required(),

        'lead_type' => $schema
            ->string()
            ->enum([
                'partnership',
                'vendor',
                'b2b',
                'product',
                'support',
                'career',
                'general',
            ])
            ->required(),

        'requirement' => $schema
            ->string()
            ->description(
                'Complete visitor requirement.'
            )
            ->required(),
    ];
}
  
    private function resolvePriority(string $requirement): string
    {
        $requirement = mb_strtolower($requirement);

        foreach ([
            'urgent',
            'immediate',
            'tender',
            'quotation',
            'bulk order',
            'corporate order',
            'large order',
        ] as $keyword) {
            if (str_contains($requirement, $keyword)) {
                return 'high';
            }
        }

        return 'normal';
    }

    private function reference(int $id): string
    {
        return 'GPT-AI-' . str_pad(
            (string) $id,
            6,
            '0',
            STR_PAD_LEFT
        );
    }
}