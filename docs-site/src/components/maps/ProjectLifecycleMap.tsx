const states = ["Draft", "Intake", "Planning", "Active", "Review", "Approved", "Completed", "Archived"];

export default function ProjectLifecycleMap() {
  return (
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_310px]">
        <div className="rounded-[1.5rem] border border-[#D8E1E6] bg-white p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)]">
          <div className="flex flex-wrap items-center gap-3">
            {states.map((state, index) => (
              <div key={state} className="flex items-center gap-3">
                <div
                  className={[
                    "rounded-2xl border px-4 py-3 text-sm font-semibold shadow-sm",
                    state === "Review"
                      ? "border-[#568FA7] bg-[#EAF2F5] text-[#25313A]"
                      : state === "Completed"
                        ? "border-[#E0916C] bg-[#FFF4EE] text-[#25313A]"
                        : "border-[#D8E1E6] bg-[#FBFCFD] text-[#25313A]",
                  ].join(" ")}
                >
                  {state}
                </div>
                {index < states.length - 1 && <span className="text-lg font-semibold text-[#568FA7]">-&gt;</span>}
              </div>
            ))}
          </div>

          <div className="mt-8 rounded-[1.25rem] border border-dashed border-[#A9CBD8] bg-[#F7FAFB] px-5 py-4">
            <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">Important transition</p>
            <p className="mt-2 text-sm leading-relaxed text-[#48535A]">
              Review can move backward to <span className="font-semibold text-[#25313A]">Active</span> when work needs changes.
            </p>
            <div className="mt-3 flex items-center gap-3 text-sm font-semibold text-[#568FA7]">
              <span>Review</span>
              <span>&lt;-</span>
              <span>Active</span>
            </div>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">Lifecycle Notes</p>
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
