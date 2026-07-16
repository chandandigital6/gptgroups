<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default AI Providers
    |--------------------------------------------------------------------------
    */

    'default' => env('AI_DEFAULT_PROVIDER', 'openai'),

    'default_for_images' => 'gemini',
    'default_for_audio' => 'openai',
    'default_for_transcription' => 'openai',
    'default_for_embeddings' => 'openai',
    'default_for_reranking' => 'cohere',

    /*
    |--------------------------------------------------------------------------
    | Default text model
    |--------------------------------------------------------------------------
    */

    'model' => env('AI_DEFAULT_MODEL', 'gpt-5-mini'),

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    */

    'caching' => [
        'embeddings' => [
            'cache' => false,
            'store' => env('CACHE_STORE', 'database'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [

        'anthropic' => [
            'driver' => 'anthropic',
            'key' => env('ANTHROPIC_API_KEY'),
            'url' => env(
                'ANTHROPIC_URL',
                'https://api.anthropic.com/v1'
            ),
        ],

        'azure' => [
            'driver' => 'azure',
            'key' => env('AZURE_OPENAI_API_KEY'),
            'url' => env('AZURE_OPENAI_URL'),
            'api_version' => env(
                'AZURE_OPENAI_API_VERSION',
                '2025-04-01-preview'
            ),
            'deployment' => env(
                'AZURE_OPENAI_DEPLOYMENT',
                'gpt-4o'
            ),
            'embedding_deployment' => env(
                'AZURE_OPENAI_EMBEDDING_DEPLOYMENT',
                'text-embedding-3-small'
            ),
            'image_deployment' => env(
                'AZURE_OPENAI_IMAGE_DEPLOYMENT',
                'gpt-image-1'
            ),
        ],

        'bedrock' => [
            'driver' => 'bedrock',
            'region' => env(
                'AWS_BEDROCK_REGION',
                'us-east-1'
            ),
            'key' => env(
                'AWS_BEARER_TOKEN_BEDROCK'
            ),
            'access_key_id' => env(
                'AWS_ACCESS_KEY_ID'
            ),
            'secret_access_key' => env(
                'AWS_SECRET_ACCESS_KEY'
            ),
            'session_token' => env(
                'AWS_SESSION_TOKEN'
            ),
            'use_default_credential_provider' => env(
                'AWS_USE_DEFAULT_CREDENTIALS',
                true
            ),
        ],

        'cohere' => [
            'driver' => 'cohere',
            'key' => env('COHERE_API_KEY'),
        ],

        'deepseek' => [
            'driver' => 'deepseek',
            'key' => env('DEEPSEEK_API_KEY'),
        ],

        'eleven' => [
            'driver' => 'eleven',
            'key' => env('ELEVENLABS_API_KEY'),
        ],

        'gemini' => [
            'driver' => 'gemini',
            'key' => env('GEMINI_API_KEY'),
            'url' => env(
                'GEMINI_URL',
                'https://generativelanguage.googleapis.com/v1beta/'
            ),
        ],

        'groq' => [
            'driver' => 'groq',
            'key' => env('GROQ_API_KEY'),
        ],

        'jina' => [
            'driver' => 'jina',
            'key' => env('JINA_API_KEY'),
        ],

        'mistral' => [
            'driver' => 'mistral',
            'key' => env('MISTRAL_API_KEY'),
        ],

        'ollama' => [
            'driver' => 'ollama',
            'key' => env('OLLAMA_API_KEY', ''),
            'url' => env(
                'OLLAMA_URL',
                'http://localhost:11434'
            ),
        ],

        /*
        |--------------------------------------------------------------------------
        | OpenAI
        |--------------------------------------------------------------------------
        */

        'openai' => [
            'driver' => 'openai',
            'key' => env('OPENAI_API_KEY'),
            'url' => env(
                'OPENAI_URL',
                'https://api.openai.com/v1'
            ),
        ],

        'openrouter' => [
            'driver' => 'openrouter',
            'key' => env('OPENROUTER_API_KEY'),
        ],

        'voyageai' => [
            'driver' => 'voyageai',
            'key' => env('VOYAGEAI_API_KEY'),
        ],

        'xai' => [
            'driver' => 'xai',
            'key' => env('XAI_API_KEY'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Conversation Storage
    |--------------------------------------------------------------------------
    */

    'conversations' => [
        'tables' => [
            'conversations' => 'agent_conversations',
            'messages' => 'agent_conversation_messages',
        ],
    ],
];