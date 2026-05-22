const states = ["Draft", "Intake", "Planning", "Active", "Review", "Approved", "Completed", "Archived"];

export default function ProjectLifecycleMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_310px]">
        <div className="rounded-[1.5rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
          <div className="flex flex-wrap items-center gap-3">
            {states.map((state, index) => (
              <div key={state} className="flex items-center gap-3">
                <div
                  className={[
                    "rounded-2xl border px-4 py-3 text-sm font-semibold shadow-sm",
                    state === "Review"
                      ? "border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] text-[var(--text-strong)]"
                      : state === "Completed"
                        ? "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)] text-[var(--text-strong)]"
                        : "border-[var(--border-soft)] bg-[var(--surface-soft)] text-[var(--text-strong)]",
                  ].join(" ")}
                >
                  {state}
                </div>
                {index < states.length - 1 && <span className="text-lg font-semibold text-[var(--accent-blue)]">-&gt;</span>}
              </div>
            ))}
          </div>

          <div className="mt-8 rounded-[1.25rem] border border-dashed border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] px-5 py-4">
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">Important transition</p>
            <p className="mt-2 text-sm leading-relaxed text-[var(--text-body)]">
              Review can move backward to <span className="font-semibold text-[var(--text-strong)]">Active</span> when work needs changes.
            </p>
            <div className="mt-3 flex items-center gap-3 text-sm font-semibold text-[var(--accent-blue)]">
              <span>Review</span>
              <span>&lt;-</span>
              <span>Active</span>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Lifecycle Notes</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Completed does not equal Archived</p>
              <p className="mt-1 text-slate-300">Closeout and archival are separate decisions.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Review can move backward</p>
              <p className="mt-1 text-slate-300">Projects return to active work when changes are required.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Scheduled usually belongs to deliverables</p>
              <p className="mt-1 text-slate-300">Project status should stay calmer and higher-level.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
