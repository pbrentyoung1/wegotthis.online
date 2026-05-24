const states = [
  "Planned",
  "In Progress",
  "In Review",
  "Waiting for Approval",
  "Changes Requested",
  "Approved",
  "Scheduled",
  "Published",
  "Archived",
];

export default function DeliverableLifecycleMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">
        <div className="rounded-[1.5rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
          <div className="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
            {states.map((state) => (
              <div
                key={state}
                className={[
                  "rounded-2xl border px-4 py-4 text-sm font-semibold shadow-sm",
                  state === "Waiting for Approval"
                    ? "border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] text-[var(--text-strong)]"
                    : state === "Changes Requested"
                    ? "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] text-[var(--text-strong)]"
                    : state === "Approved"
                      ? "border-[var(--accent-blue-border)] bg-white text-[var(--text-strong)]"
                      : "border-[var(--border-soft)] bg-[var(--surface-soft)] text-[var(--text-strong)]",
                ].join(" ")}
              >
                {state}
              </div>
            ))}
          </div>

          <div className="mt-6 rounded-[1.25rem] border border-dashed border-[var(--border-soft)] bg-[var(--surface-soft)] px-5 py-4">
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Status distinction</p>
            <p className="mt-2 text-sm leading-relaxed text-[var(--text-body)]">
              Deliverable status remains more detailed than project status, especially through review, approval, scheduling, and publication.
            </p>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Lifecycle Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Approval logic lives here</p>
              <p className="mt-1 text-slate-300">Most review and approval loops belong to deliverables, not entire projects.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Changes Requested loops here</p>
              <p className="mt-1 text-slate-300">Deliverables can move back into active work without forcing the whole project backward automatically.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Waiting for Approval lives here</p>
              <p className="mt-1 text-slate-300">This status belongs to deliverables or elements, not the project itself.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Published is the last live state</p>
              <p className="mt-1 text-slate-300">After publication, the deliverable should be retained through archive rather than left ambiguous.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
