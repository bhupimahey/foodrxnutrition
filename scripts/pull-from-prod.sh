#!/usr/bin/env bash
set -euo pipefail

# Download the production WordPress theme into the repo root.
#
# Usage:
#   ./scripts/pull-from-prod.sh
#
# Required environment variables:
#   PROD_SSH_USER
#   PROD_SSH_HOST
#   PROD_SSH_PORT
#   PROD_REMOTE_ROOT   e.g. public_html/foodrxnutrition.com/wp-content/themes/healthy-living
#
# Optional:
#   PROD_SSH_PRIVATE_KEY_PATH   default: ~/.ssh/id_rsa

SSH_KEY="${PROD_SSH_PRIVATE_KEY_PATH:-$HOME/.ssh/id_rsa}"
REMOTE="${PROD_REMOTE_ROOT:?Set PROD_REMOTE_ROOT}"
USER="${PROD_SSH_USER:?Set PROD_SSH_USER}"
HOST="${PROD_SSH_HOST:?Set PROD_SSH_HOST}"
PORT="${PROD_SSH_PORT:?Set PROD_SSH_PORT}"

REPO_ROOT="$(cd "$(dirname "$0")/.." && pwd)"

echo "Pulling theme from ${USER}@${HOST}:${REMOTE}/"
echo "Destination: ${REPO_ROOT}/"
echo

rsync -avz --progress \
  --exclude '.git/' \
  --exclude '.github/' \
  --exclude 'scripts/' \
  --exclude 'node_modules/' \
  --exclude '.env' \
  --exclude '.DS_Store' \
  --exclude 'Thumbs.db' \
  -e "ssh -p ${PORT} -i ${SSH_KEY} -o StrictHostKeyChecking=accept-new" \
  "${USER}@${HOST}:${REMOTE}/" \
  "${REPO_ROOT}/"

echo
echo "Done. Review changes with: git status"
