const states = [
  "Intake",
  "Discovery",
  "Approved",
  "Planned",
  "Active",
  "In Review",
  "Revision",
  "Scheduled",
  "Published",
  "Closeout",
  "Archived",
];

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
                    state === "Revision"
                      ? "border-[var(--accent-blue-border)] bg-[var(--accent-blue-soft)] text-[var(--text-strong)]"
                      : state === "Closeout"
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
              In Review can move into <span className="font-semibold text-[var(--text-strong)]">Revision</span> when one or more deliverables need changes before the project can move forward.
              </p>
              <div className="mt-3 flex items-center gap-3 text-sm font-semibold text-[var(--accent-blue)]">
                <span>In Review</span>
              <span>-&gt;</span>
              <span>Revision</span>
              </div>
            </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Lifecycle Notes</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Published does not equal done</p>
              <p className="mt-1 text-slate-300">Projects still need closeout before they can be archived.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Revision belongs in the project lifecycle</p>
              <p className="mt-1 text-slate-300">Changes requested on one or more deliverables can move the project into Revision.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Waiting for Approval is not a project state</p>
              <p className="mt-1 text-slate-300">Approval waiting belongs to deliverables or reviewable elements.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Closeout is required</p>
              <p className="mt-1 text-slate-300">A project is not done when it is published. It is done when it is closed out and archived.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
