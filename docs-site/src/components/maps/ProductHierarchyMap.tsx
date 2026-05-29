const levels = [
  {
    label: "Strategic Context",
    note: "Optional context",
    description: "Initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags.",
    helper: "Context guides briefs without forcing every project into a campaign.",
  },
  {
    label: "Project",
    note: "Core workspace",
    description: "A coordinated body of operational work with title, owner, objective, start date, stop date, timeline, and people.",
    helper: "Projects are the primary operational home.",
  },
  {
    label: "Deliverable",
    note: "Required under project",
    description: "The concrete output being produced, reviewed, scheduled, or delivered.",
    helper: "Deliverables focus production tasks.",
  },
  {
    label: "Task",
    note: "Project required",
    description: "The assigned unit of work that moves production forward.",
    helper: "Tasks belong to projects and may optionally belong to deliverables.",
  },
];

export default function ProductHierarchyMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_290px]">
        <div className="space-y-4">
          {levels.map((level, index) => (
            <div key={level.label}>
              <div className="rounded-[1.4rem] border border-[var(--border-soft)] bg-white p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
                <div className="flex flex-col gap-4 md:flex-row md:items-center">
                  <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-[var(--accent-blue-soft)] text-lg font-semibold text-[var(--accent-blue)]">
                    {index + 1}
                  </div>

                  <div className="min-w-0 flex-1">
                    <div className="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                      <h3 className="text-2xl font-semibold tracking-tight text-[var(--text-strong)]">{level.label}</h3>
                      <p className="text-sm font-semibold text-[var(--accent-coral)]">{level.note}</p>
                    </div>
                    <p className="mt-1 text-sm leading-relaxed text-[var(--text-muted)] md:text-base">{level.description}</p>
                    <p className="mt-3 text-sm font-medium text-[var(--text-body)]">{level.helper}</p>
                  </div>
                </div>
              </div>

              {index < levels.length - 1 && (
                <div className="flex items-center justify-center py-2 text-[var(--accent-blue)]">
                  <div className="flex flex-col items-center">
                    <span className="text-2xl leading-none">v</span>
                    <span className="mt-1 text-[11px] font-semibold uppercase tracking-[0.24em]">1 to many</span>
                  </div>
                </div>
              )}
            </div>
          ))}
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Structure Rules</p>
          <h3 className="mt-3 text-2xl font-semibold tracking-tight">{"Strategic Context -> Project Brief -> Deliverable Brief -> Tasks"}</h3>
          <p className="mt-3 text-sm leading-relaxed text-[var(--panel-muted)]">
            Strategic context explains why work matters. Projects, deliverables, and tasks remain the operational work model.
          </p>

          <div className="mt-6 space-y-4 text-sm">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-[var(--panel-accent)]">{"Strategic Context -> Project"}</p>
              <p className="mt-1 text-slate-200">Optional association</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-[var(--panel-accent)]">{"Project -> Deliverable"}</p>
              <p className="mt-1 text-slate-200">Required relationship</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-[var(--panel-accent)]">{"Project -> Task"}</p>
              <p className="mt-1 text-slate-200">Required, with optional deliverable relationship</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
