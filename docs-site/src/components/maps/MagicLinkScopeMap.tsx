const scopeCards = [
  "Tenant / Church",
  "Project",
  "Deliverable",
  "Asset / Version",
  "Permitted Actions",
  "Expiration Date",
  "Optional Identity Capture",
  "Audit Trail",
];

const actions = ["View only", "Comment", "Approve", "Request changes", "Upload file"];

export default function MagicLinkScopeMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="space-y-4">
          <div className="grid gap-4 md:grid-cols-3">
            <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)] md:col-span-1">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">1. Generate Link</p>
              <h3 className="mt-2 text-xl font-semibold tracking-tight text-[var(--text-strong)]">Internal User</h3>
              <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                An internal user creates a review link for a specific external person and specific work context.
              </p>
            </div>
            <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-[var(--surface-soft)] p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)] md:col-span-2">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">2. Define Scope</p>
              <div className="mt-3 grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
                {scopeCards.map((item) => (
                  <div key={item} className="rounded-2xl border border-[var(--border-soft)] bg-white px-4 py-3 text-sm font-medium text-[var(--text-strong)]">
                    {item}
                  </div>
                ))}
              </div>
            </div>
          </div>

          <div className="rounded-[1.4rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
            <div className="grid gap-4 lg:grid-cols-[1fr_130px_1fr] lg:items-center">
              <div>
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">3. Reviewer Opens Link</p>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  The external reviewer opens the link on mobile or desktop without a full account.
                </p>
              </div>

              <div className="flex justify-center">
                <div className="rounded-full border border-[var(--border-soft)] bg-[var(--accent-blue-soft)] px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em] text-[var(--accent-blue)]">
                  Validate
                </div>
              </div>

              <div className="rounded-[1.25rem] border border-dashed border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] px-5 py-4">
                <p className="text-sm font-semibold text-[var(--text-strong)]">Token + Expiration + Scope + Permission</p>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  Access only proceeds when the token is valid, unexpired, unrevoked, and tied to an explicit action set.
                </p>
              </div>
            </div>
          </div>

          <div className="grid gap-4 lg:grid-cols-[1fr_1fr]">
            <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">4. Explicit Actions</p>
              <div className="mt-3 flex flex-wrap gap-3">
                {actions.map((action, index) => (
                  <div
                    key={action}
                    className={`rounded-full border px-4 py-2 text-sm font-medium ${
                      index < 4
                        ? "border-[var(--border-soft)] bg-[var(--surface-soft)] text-[var(--text-strong)]"
                        : "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] text-[var(--text-strong)]"
                    }`}
                  >
                    {action}
                  </div>
                ))}
              </div>
              <p className="mt-4 text-sm leading-relaxed text-[var(--text-muted)]">
                Permissions are explicit. They should not be inherited casually from broader internal project access.
              </p>
            </div>

            <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">5. Action Logged</p>
              <div className="mt-3 rounded-2xl border border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] px-4 py-4">
                <p className="text-sm font-semibold text-[var(--text-strong)]">Every external action is audited</p>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  Opened link, approved deliverable, requested changes, or uploaded file actions all produce durable records.
                </p>
              </div>
              <p className="mt-4 text-sm leading-relaxed text-[var(--text-muted)]">
                Links expire or are revoked when their job is finished, when access changes, or when risk needs to be reduced.
              </p>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Scope Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Link access is narrow</p>
              <p className="mt-1 text-slate-300">Magic links should expose only the exact context an external person needs.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Every action is audited</p>
              <p className="mt-1 text-slate-300">The system should capture who used the link and what they did.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Expiration is required</p>
              <p className="mt-1 text-slate-300">Time-bound access is part of the security model, not a nice-to-have.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Revocation must be supported</p>
              <p className="mt-1 text-slate-300">Links should be withdrawable whenever project, security, or people conditions change.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
