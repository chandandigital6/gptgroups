<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
  public function boot(): void
{
    $this->configureDefaults();

    RateLimiter::for(
        'gpt-group-ai',
        function (Request $request): array {
            $visitorUuid = $request->cookie(
                'gpt_group_ai_visitor'
            );

            $identifier = $visitorUuid
                ?: $request->ip();

            return [
                Limit::perMinute(12)
                    ->by(
                        'gpt-group-ai-minute-'
                        . $identifier
                    )
                    ->response(
                        function (
                            Request $request,
                            array $headers
                        ) {
                            return response()->json([
                                'success' => false,
                                'error_code' =>
                                    'AI_RATE_LIMITED',

                                'message' =>
                                    'Too many AI requests. Please wait a minute and try again.',
                            ], 429, $headers);
                        }
                    ),

                Limit::perDay(150)
                    ->by(
                        'gpt-group-ai-day-'
                        . $identifier
                    )
                    ->response(
                        function (
                            Request $request,
                            array $headers
                        ) {
                            return response()->json([
                                'success' => false,
                                'error_code' =>
                                    'AI_DAILY_LIMIT_REACHED',

                                'message' =>
                                    'Your daily AI chat limit has been reached. Please try again tomorrow.',
                            ], 429, $headers);
                        }
                    ),
            ];
        }
    );
}

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
