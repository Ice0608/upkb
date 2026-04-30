$ErrorActionPreference = "Stop"

# Test Groq
Write-Output "=== Testing Groq ==="
try {
    $headers = @{
        "Authorization" = "Bearer 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"
        "Content-Type" = "application/json"
    }
    $body = '{"model":"llama-3.3-70b-versatile","messages":[{"role":"user","content":"say ok"}],"max_tokens":5}'
    $response = Invoke-RestMethod -Uri "https://api.groq.com/openai/v1/chat/completions" -Method Post -Headers $headers -Body $body -TimeoutSec 15
    Write-Output "SUCCESS"
    Write-Output ($response | ConvertTo-Json -Depth 5)
} catch {
    Write-Output "FAILED"
    Write-Output $_.Exception.Message
    if ($_.Exception.Response) {
        $stream = $_.Exception.Response.GetResponseStream()
        $reader = New-Object System.IO.StreamReader($stream)
        Write-Output "RESPONSE BODY: $($reader.ReadToEnd())"
    }
}

Write-Output ""
Write-Output "=== Testing OpenRouter ==="
try {
    $headers = @{
        "Authorization" = "Bearer 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"
        "Content-Type" = "application/json"
    }
    $body = '{"model":"google/gemini-2.0-flash-exp","messages":[{"role":"user","content":"say ok"}],"max_tokens":5}'
    $response = Invoke-RestMethod -Uri "https://openrouter.ai/api/v1/chat/completions" -Method Post -Headers $headers -Body $body -TimeoutSec 15
    Write-Output "SUCCESS"
    Write-Output ($response | ConvertTo-Json -Depth 5)
} catch {
    Write-Output "FAILED"
    Write-Output $_.Exception.Message
    if ($_.Exception.Response) {
        $stream = $_.Exception.Response.GetResponseStream()
        $reader = New-Object System.IO.StreamReader($stream)
        Write-Output "RESPONSE BODY: $($reader.ReadToEnd())"
    }
}
