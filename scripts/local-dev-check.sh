#!/usr/bin/env bash

set -u

if [ -x /opt/homebrew/bin/brew ]; then
  eval "$(/opt/homebrew/bin/brew shellenv)"
fi

if [ -d /opt/homebrew/opt/postgresql@16/bin ]; then
  export PATH="/opt/homebrew/opt/postgresql@16/bin:$PATH"
fi

pass_count=0
warn_count=0
fail_count=0

status_line() {
  local state="$1"
  local label="$2"
  local detail="$3"

  case "$state" in
    pass) pass_count=$((pass_count + 1)); printf 'PASS  %-18s %s\n' "$label" "$detail" ;;
    warn) warn_count=$((warn_count + 1)); printf 'WARN  %-18s %s\n' "$label" "$detail" ;;
    fail) fail_count=$((fail_count + 1)); printf 'FAIL  %-18s %s\n' "$label" "$detail" ;;
  esac
}

command_version() {
  local command_name="$1"
  local version_command="$2"

  if command -v "$command_name" >/dev/null 2>&1; then
    status_line pass "$command_name" "$($version_command 2>&1 | head -n 1)"
  else
    status_line fail "$command_name" "not found on PATH"
  fi
}

printf 'ForWorship Creative Local Dev Check\n'
printf '====================================\n\n'

command_version php "php -v"
command_version composer "composer --version"
command_version node "node -v"
command_version npm "npm -v"
command_version psql "psql --version"
command_version postgres "postgres --version"

if command -v php >/dev/null 2>&1; then
  php -m 2>/dev/null | grep -qi '^pdo_pgsql$' \
    && status_line pass "pdo_pgsql" "PHP extension installed" \
    || status_line fail "pdo_pgsql" "PHP extension missing"

  php -m 2>/dev/null | grep -qi '^pgsql$' \
    && status_line pass "pgsql" "PHP extension installed" \
    || status_line fail "pgsql" "PHP extension missing"
else
  status_line warn "php extensions" "skipped because PHP is not available"
fi

if command -v git >/dev/null 2>&1; then
  status_line pass git "$(git --version)"
else
  status_line fail git "not found on PATH"
fi

printf '\nSummary: %s pass, %s warn, %s fail\n' "$pass_count" "$warn_count" "$fail_count"

if [ "$fail_count" -gt 0 ]; then
  printf '\nRequired before Laravel scaffolding: PHP 8.3+, Composer, PostgreSQL tools, and PHP PostgreSQL extensions.\n'
  exit 1
fi

exit 0
