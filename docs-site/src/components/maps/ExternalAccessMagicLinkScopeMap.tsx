const flowSteps = [
  {
    eyebrow: "1. Review Needed",
    title: "External review or handoff is requested",
    detail:
      "A deliverable enters In Review or Waiting for Approval, a Communications Lead or Project Owner requests outside input, or a vendor-scoped handoff is needed without creating a full account.",
    tone: "blue",
  },
  {
    eyebrow: "2. Link Generated",
    title: "Magic link is created",
    detail:
      "An authorized internal user creates a secure link for an External Reviewer and ties it to the tenant, work context, actions, expiration, and audit metadata.",
    tone: "surface",
  },
  {
    eyebrow: "3. Scope Defined",
    title: "Access boundary is explicit",
    detail:
      "The link is limited to a specific deliverable, project summary, approval request, or later vendor handoff area. It does not expand into general workspace access.",
    tone: "coral",
  },
  {
    eyebrow: "4. Link Opened",
    title: "External Reviewer opens the link",
    detail:
      "The shared experience should be mobile-first, no-account, calm, and clearly contextual so the reviewer sees only the shared item and next action.",
    tone: "surface",
  },
  {
    eyebrow: "5. Reviewer Acts",
    title: "Allowed actions are performed",
    detail:
      "The reviewer may view, comment, approve, request changes, or upload selected files only when the link explicitly permits those actions.",
    tone: "blue",
  },
  {
    eyebrow: "6. System Records Action",
    title: "The action becomes history",
    detail:
      "The platform records project-feed history, activity entries, audit records where appropriate, approval history, and notification events for internal users.",
    tone: "surface",
  },
  {
    eyebrow: "7. Internal Notification",
    title: "Internal team is updated",
    detail:
      "Project Owner, Communications Lead, Reviewer, or assigned Contributor can be notified depending on what happened and whether changes are required.",
    tone: "surface",
  },
  {
    eyebrow: "8. Link Lifecycle",
    title: "Access remains time-bound",
    detail:
      "The link can remain active, expire, be revoked, be superseded by a new link, or be marked used depending on the workflow and security state.",
    tone: "coral",
  },
];

const conceptualFields = [
  "tenant_id",
  "project_id",
  "deliverable_id",
  "recipient_email",
  "token_hash",
  "allowed_actions",
  "expires_at",
  "revoked_at",
  "used_at",
  "created_by_user_id",
];

const scopeBoundary = [
  "Tenant-bound",
  "Project-bound",
  "Deliverable-bound when applicable",
  "Recipient-bound when possible",
  "Action-bound",
  "Expiration-bound",
  "Revocable",
];

const allowedActions = ["View shared context", "View selected files", "Comment", "Approve", "Request changes", "Selected file upload"];

const blockedActions = [
  "Tenant-wide access",
  "Unrelated project visibility",
  "User or settings management",
  "Unrestricted media access",
  "Project ownership changes",
  "Bypassing audit or approval history",
];

const recordsCreated = ["Comment / message", "Activity feed item", "Audit log entry", "Approval history entry", "Notification event"];

const toneClasses = {
  blue: "border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)]",
  coral: "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)]",
  surface: "border-[var(--border-soft)] bg-white",
};

export default function ExternalAccessMagicLinkScopeMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">
        <div className="space-y-6">
          <div className="rounded-[1.4rem] border border-dashed border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] px-5 py-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Core Security Principle</p>
            <p className="mt-2 text-base leading-relaxed text-[var(--text-strong)]">
              Magic links do not grant general tenant access. They grant limited, time-bound access to a specific project or deliverable context.
            </p>
            <p className="mt-3 text-sm leading-relaxed text-[var(--text-body)]">
              External access should reduce friction without weakening security or creating extra accounts unnecessarily.
            </p>
          </div>

          <div className="grid gap-4 md:grid-cols-2">
            {flowSteps.map((step, index) => (
              <div key={step.eyebrow} className="relative">
                <div className={`rounded-[1.35rem] border p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)] ${toneClasses[step.tone as keyof typeof toneClasses]}`}>
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">{step.eyebrow}</p>
                  <h3 className="mt-2 text-xl font-semibold tracking-tight text-[var(--text-strong)]">{step.title}</h3>
                  <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">{step.detail}</p>
                </div>
                {index < flowSteps.length - 1 && (
                  <div className="pointer-events-none hidden md:flex absolute -bottom-3 left-1/2 -translate-x-1/2 items-center justify-center text-[var(--accent-blue)]">
                    <div className="rounded-full border border-[var(--border-soft)] bg-[var(--page-bg)] px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em]">
                      Next
                    </div>
                  </div>
                )}
              </div>
            ))}
          </div>

          <div className="grid gap-4 xl:grid-cols-[1.2fr_0.8fr]">
            <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Conceptual Link Metadata</p>
              <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                These labels are conceptual reference fields for the map, not final schema decisions.
              </p>
              <div className="mt-4 flex flex-wrap gap-3">
                {conceptualFields.map((field) => (
                  <span key={field} className="rounded-full border border-[var(--border-soft)] bg-[var(--surface-soft)] px-3 py-1.5 text-xs font-semibold tracking-[0.08em] text-[var(--text-strong)]">
                    {field}
                  </span>
                ))}
              </div>
            </div>

            <div className="rounded-[1.35rem] border border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-coral)]">Not Granted</p>
              <p className="mt-2 text-sm leading-relaxed text-[var(--text-body)]">
                External links should never behave like lightweight internal accounts. The scope stays narrow even when the experience feels simple.
              </p>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <div className="space-y-5">
            <div>
              <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Scope Boundary</p>
              <div className="mt-3 flex flex-wrap gap-2">
                {scopeBoundary.map((item) => (
                  <span key={item} className="rounded-full border border-white/10 bg-white/6 px-3 py-1.5 text-xs font-semibold tracking-[0.08em] text-white">
                    {item}
                  </span>
                ))}
              </div>
            </div>

            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
              <p className="font-semibold text-white">Allowed Actions</p>
              <ul className="mt-3 space-y-2 text-sm leading-relaxed text-slate-300">
                {allowedActions.map((action) => (
                  <li key={action}>- {action}</li>
                ))}
              </ul>
            </div>

            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
              <p className="font-semibold text-white">Records Created</p>
              <ul className="mt-3 space-y-2 text-sm leading-relaxed text-slate-300">
                {recordsCreated.map((record) => (
                  <li key={record}>- {record}</li>
                ))}
              </ul>
            </div>

            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
              <p className="font-semibold text-white">Not Allowed</p>
              <ul className="mt-3 space-y-2 text-sm leading-relaxed text-slate-300">
                {blockedActions.map((action) => (
                  <li key={action}>- {action}</li>
                ))}
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
