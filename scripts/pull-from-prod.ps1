# Download the production WordPress theme into the repo root.
#
# Usage:
#   $env:PROD_SSH_USER = "your_user"
#   $env:PROD_SSH_HOST = "your_host"
#   $env:PROD_SSH_PORT = "22"
#   $env:PROD_REMOTE_ROOT = "public_html/foodrxnutrition.com/wp-content/themes/healthy-living"
#   $env:PROD_SSH_PRIVATE_KEY_PATH = "$env:USERPROFILE\.ssh\id_rsa"   # optional
#   .\scripts\pull-from-prod.ps1
#
# Requires rsync (Git Bash, WSL, or rsync for Windows).

$ErrorActionPreference = "Stop"

if (-not $env:PROD_SSH_USER) { throw "Set PROD_SSH_USER" }
if (-not $env:PROD_SSH_HOST) { throw "Set PROD_SSH_HOST" }
if (-not $env:PROD_SSH_PORT) { throw "Set PROD_SSH_PORT" }
if (-not $env:PROD_REMOTE_ROOT) { throw "Set PROD_REMOTE_ROOT" }

$keyPath = if ($env:PROD_SSH_PRIVATE_KEY_PATH) {
    $env:PROD_SSH_PRIVATE_KEY_PATH
} else {
    Join-Path $env:USERPROFILE ".ssh\id_rsa"
}

$repoRoot = Split-Path -Parent (Split-Path -Parent $MyInvocation.MyCommand.Path)
$remote = "$($env:PROD_SSH_USER)@$($env:PROD_SSH_HOST):$($env:PROD_REMOTE_ROOT)/"

Write-Host "Pulling theme from $remote"
Write-Host "Destination: $repoRoot\"
Write-Host ""

$rsyncArgs = @(
    "-avz", "--progress",
    "--exclude", ".git/",
    "--exclude", ".github/",
    "--exclude", "scripts/",
    "--exclude", "node_modules/",
    "--exclude", ".env",
    "--exclude", ".DS_Store",
    "--exclude", "Thumbs.db",
    "-e", "ssh -p $($env:PROD_SSH_PORT) -i `"$keyPath`" -o StrictHostKeyChecking=accept-new",
    $remote,
    "$repoRoot/"
)

& rsync @rsyncArgs

Write-Host ""
Write-Host "Done. Review changes with: git status"
