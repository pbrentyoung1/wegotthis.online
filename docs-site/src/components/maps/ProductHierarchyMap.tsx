const levels = [
  {
    label: "Campaign",
    note: "Optional parent",
    description: "A strategic container that groups related projects.",
    helper: "Campaigns organize projects.",
  },
  {
    label: "Project",
    note: "Core workspace",
    description: "A coordinated body of work with its own context, timeline, and people.",
    helper: "Projects organize deliverables.",
  },
  {
    label: "Deliverable",
    note: "Required under project",
    description: "The concrete output being produced, reviewed, scheduled, or delivered.",
    helper: "Deliverables organize tasks.",
  },
  {
    label: "Task",
    note: "Required under deliverable",
    description: "The assigned unit of work that moves production forward.",
    helper: "Tasks get the work done.",
  },
];

export default function ProductHierarchyMap() {
  return (
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_290px]">
        <div className="space-y-4">
          {levels.map((level, index) => (
            <div key={level.label}>
              <div className="rounded-[1.4rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
                <div className="flex flex-col gap-4 md:flex-row md:items-center">
                  <div className="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#EAF2F5] text-lg font-semibold text-[#568FA7]">
                    {index + 1}
                  </div>

                  <div className="min-w-0 flex-1">
                    <div className="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                      <h3 className="text-2xl font-semibold tracking-tight text-[#25313A]">{level.label}</h3>
                      <p className="text-sm font-semibold text-[#E0916C]">{level.note}</p>
                    </div>
                    <p className="mt-1 text-sm leading-relaxed text-[#66737B] md:text-base">{level.description}</p>
                    <p className="mt-3 text-sm font-medium text-[#48535A]">{level.helper}</p>
                  </div>
                </div>
              </div>

              {index < levels.length - 1 && (
                <div className="flex items-center justify-center py-2 text-[#568FA7]">
                  <div className="flex flex-col items-center">
                    <span className="text-2xl leading-none">v</span>
                    <span className="mt-1 text-[11px] font-semibold uppercase tracking-[0.24em]">1 to many</span>
                  </div>
                </div>
              )}
            </div>
          ))}
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">Structure Rules</p>
          <h3 className="mt-3 text-2xl font-semibold tracking-tight">{"Campaign -> Project -> Deliverable -> Task"}</h3>
          <p className="mt-3 text-sm leading-relaxed text-slate-300">
            This is the first mental model the team should share before deeper workflow, data, or permission work begins.
          </p>

          <div className="mt-6 space-y-4 text-sm">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-[#A9CBD8]">{"Campaign -> Project"}</p>
              <p className="mt-1 text-slate-200">Optional relationship</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-[#A9CBD8]">{"Project -> Deliverable"}</p>
              <p className="mt-1 text-slate-200">Required relationship</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-[#A9CBD8]">{"Deliverable -> Task"}</p>
              <p className="mt-1 text-slate-200">Required relationship</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
