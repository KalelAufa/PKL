<?php

declare(strict_types=1);

namespace App\Logging;

use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

/**
 * Redact PII (email, password, IP, token) dari log record.
 * Diterapkan ke semua channel agar data sensitif tidak tersimpan polos.
 */
class SensitiveDataProcessor implements ProcessorInterface
{
    private const SENSITIVE_KEYS = [
        'password',
        'password_confirmation',
        'current_password',
        'token',
        'api_key',
        'authorization',
        'secret',
        'cookie',
    ];

    public function __invoke(LogRecord $record): LogRecord
    {
        $context = $this->redactArray($record->context);

        // Redact message jika mengandung kunci sensitif
        $message = $this->redactString($record->message);

        return $record->with(message: $message, context: $context);
    }

    private function redactArray(array $data): array
    {
        foreach ($data as $key => $value) {
            $keyLower = strtolower((string) $key);

            // Key sensitif langsung di-redact
            if (in_array($keyLower, self::SENSITIVE_KEYS, true)) {
                $data[$key] = '[REDACTED]';
                continue;
            }

            // Value string: cek email + IP
            if (is_string($value)) {
                $data[$key] = $this->redactString($value);
                continue;
            }

            // Rekursif untuk nested array
            if (is_array($value)) {
                $data[$key] = $this->redactArray($value);
            }
        }

        return $data;
    }

    private function redactString(string $value): string
    {
        // Redact email: user@domain.com -> [EMAIL]
        $value = preg_replace('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', '[EMAIL]', $value);

        // Redact IPv4: 103.123.45.67 -> [IP]
        $value = preg_replace('/\b(?:\d{1,3}\.){3}\d{1,3}\b/', '[IP]', $value);

        // Redact password=xxx / token=xxx pattern di message string
        $value = preg_replace('/(password|token|secret|api_key)(["\']?\s*[:=]\s*["\']?)[^"\s,\}\]]+/i', '$1$2[REDACTED]', $value);

        return $value;
    }
}
