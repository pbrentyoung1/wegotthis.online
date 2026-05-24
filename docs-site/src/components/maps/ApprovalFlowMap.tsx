const steps = [
  {
    title: "Submit for Review",
    detail: "Creator sends a deliverable version into the review flow.",
    tone: "blue",
  },
  {
    title: "Internal Review",
    detail: "An internal reviewer checks fit, clarity, and readiness.",
    tone: "blue",
  },
  {
    title: "Changes Requested",
    detail: "Work loops back when internal review or external review finds issues.",
    tone: "coral",
  },
  {
    title: "Additional Review",
    detail: "Optional reviewer or external reviewer review may happen through scoped access.",
    tone: "blue",
  },
  {
    title: "Final Approved",
    detail: "Approval is version-specific and clears the deliverable to move into scheduling or publication work.",
    tone: "blue",
  },
  {
    title: "Scheduled / Published",
    detail: "Approved work moves into scheduling and publication flow, not automatic completion.",
    tone: "coral",
  },
];

const getToneClasses = (tone: "blue" | "coral") =>
  tone === "coral"
    ? "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)]"
    : "border-[var(--border-soft)] bg-[var(--surface-soft)]";

export default function ApprovalFlowMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="space-y-4">
          <div className="grid gap-4 md:grid-cols-2">
            {steps.slice(0, 2).map((step) => (
              <div
                key={step.title}
                className={`rounded-[1.35rem] border p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)] ${getToneClasses(step.tone)}`}
              >
                <h3 className="text-xl font-semibold tracking-tight text-[var(--text-strong)]">{step.title}</h3>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">{step.detail}</p>
              </div>
            ))}
          </div>

          <div className="flex justify-center text-[var(--accent-blue)]">
            <div className="rounded-full border border-[var(--border-soft)] bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em]">
              Decision: Approved?
            </div>
          </div>

          <div className="grid gap-4 lg:grid-cols-[1fr_120px_1fr] lg:items-stretch">
            <div className="rounded-[1.35rem] border border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-coral)]">No</p>
                <h3 className="mt-2 text-xl font-semibold tracking-tight text-[var(--text-strong)]">Changes Requested</h3>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  Review notes send work back into production. The loop should preserve reviewer, date, and version context.
                </p>
              <div className="mt-4 rounded-2xl border border-[var(--accent-coral-border)] bg-white/70 px-4 py-3 text-sm font-medium text-[var(--text-body)]">
                Returns to In Progress
              </div>
            </div>

            <div className="flex items-center justify-center text-[var(--accent-blue)]">
              <div className="rounded-full border border-[var(--border-soft)] bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.22em]">
                Loop
              </div>
            </div>

            <div className="space-y-4">
              <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-[var(--surface-soft)] p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Yes</p>
                <h3 className="mt-2 text-xl font-semibold tracking-tight text-[var(--text-strong)]">Additional Review?</h3>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  Some deliverables can stop at internal approval. Others move to a reviewer or External Reviewer through a magic link.
                </p>
              </div>

              <div className="grid gap-4 md:grid-cols-2">
                <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">No extra review</p>
                  <h4 className="mt-2 text-lg font-semibold text-[var(--text-strong)]">Final Approved</h4>
                </div>
                <div className="rounded-[1.35rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
                  <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Yes</p>
                  <h4 className="mt-2 text-lg font-semibold text-[var(--text-strong)]">Additional Review</h4>
                  <p className="mt-2 text-sm text-[var(--text-muted)]">Approve or request changes.</p>
                </div>
              </div>
            </div>
          </div>

          <div className="rounded-[1.4rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
            <div className="grid gap-4 md:grid-cols-2">
              <div>
                <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Final State</p>
                <h3 className="mt-2 text-xl font-semibold tracking-tight text-[var(--text-strong)]">Final Approved</h3>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  The system records who approved, when they approved, and exactly which version was approved.
                </p>
              </div>
              <div className="rounded-2xl border border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] px-4 py-4">
                <p className="text-sm font-semibold text-[var(--text-strong)]">Scheduled / Published</p>
                <p className="mt-2 text-sm leading-relaxed text-[var(--text-muted)]">
                  Approval clears the deliverable for the next live step. It does not mean the deliverable is complete or archived.
                </p>
              </div>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Core Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Approval is version-specific</p>
              <p className="mt-1 text-slate-300">The record must capture who approved, when, and what version they approved.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Approval clears fulfillment</p>
              <p className="mt-1 text-slate-300">Approved work can move into scheduled and publication states.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Changes return to production</p>
              <p className="mt-1 text-slate-300">Review loops backward without losing context or history.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">External review is scoped</p>
              <p className="mt-1 text-slate-300">External Reviewer access can happen through narrow magic-link scope.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
