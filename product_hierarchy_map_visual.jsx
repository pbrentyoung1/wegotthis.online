import React from "react";
import { ArrowDown, Layers, FolderKanban, FileCheck2, CheckSquare } from "lucide-react";

const levels = [
  {
    label: "Campaign",
    description: "The strategic container",
    example: "Christmas Outreach",
    icon: Layers,
    note: "Optional parent for projects",
  },
  {
    label: "Project",
    description: "A coordinated body of work",
    example: "Christmas Eve Service Promotion",
    icon: FolderKanban,
    note: "Can stand alone or belong to a campaign",
  },
  {
    label: "Deliverable",
    description: "A concrete thing being produced",
    example: "Instagram Graphic",
    icon: FileCheck2,
    note: "Always belongs to a project",
  },
  {
    label: "Task",
    description: "The assigned unit of work",
    example: "Resize for story format",
    icon: CheckSquare,
    note: "Always belongs to a deliverable",
  },
];

export default function ProductHierarchyMap() {
  return (
    <div className="min-h-screen bg-[#F7F9FB] text-[#48535A] p-8 flex items-center justify-center">
      <div className="w-full max-w-5xl bg-white rounded-3xl shadow-sm border border-slate-200 p-8 md:p-10">
        <div className="mb-8 border-b border-slate-200 pb-6">
          <p className="text-sm uppercase tracking-[0.22em] text-[#568FA7] font-semibold mb-3">
            wegotthis.online product model
          </p>
          <h1 className="text-3xl md:text-4xl font-semibold text-[#25313A] mb-3">
            Product Hierarchy Map
          </h1>
          <p className="text-lg text-[#66737B] max-w-3xl leading-relaxed">
            The simple mental model every developer, designer, and stakeholder should understand before anything else gets built.
          </p>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-[1fr_280px] gap-8 items-start">
          <div className="space-y-4">
            {levels.map((level, index) => {
              const Icon = level.icon;
              return (
                <div key={level.label}>
                  <div className="rounded-2xl border border-slate-200 bg-[#FBFCFD] p-5 shadow-sm">
                    <div className="flex flex-col md:flex-row md:items-center gap-4">
                      <div className="h-14 w-14 rounded-2xl bg-[#EAF2F5] flex items-center justify-center shrink-0">
                        <Icon className="h-7 w-7 text-[#568FA7]" />
                      </div>

                      <div className="flex-1">
                        <div className="flex flex-col md:flex-row md:items-baseline md:justify-between gap-1">
                          <h2 className="text-2xl font-semibold text-[#25313A]">
                            {level.label}
                          </h2>
                          <p className="text-sm text-[#E0916C] font-semibold">
                            {level.note}
                          </p>
                        </div>
                        <p className="text-base text-[#66737B] mt-1">
                          {level.description}
                        </p>
                        <p className="text-sm text-[#48535A] mt-3">
                          Example: <span className="font-semibold">{level.example}</span>
                        </p>
                      </div>
                    </div>
                  </div>

                  {index < levels.length - 1 && (
                    <div className="flex items-center justify-center py-2">
                      <div className="flex flex-col items-center text-[#568FA7]">
                        <ArrowDown className="h-6 w-6" />
                        <span className="text-xs font-semibold uppercase tracking-widest mt-1">
                          1 to many
                        </span>
                      </div>
                    </div>
                  )}
                </div>
              );
            })}
          </div>

          <aside className="rounded-2xl bg-[#25313A] text-white p-6 shadow-sm">
            <h3 className="text-xl font-semibold mb-4">Core Rule</h3>
            <p className="text-sm leading-relaxed text-slate-200 mb-5">
              Campaigns organize projects. Projects organize deliverables. Deliverables organize tasks. Tasks get the work done.
            </p>

            <div className="space-y-4 text-sm">
              <div className="border-t border-white/15 pt-4">
                <p className="text-[#A9CBD8] font-semibold mb-1">Campaign → Project</p>
                <p className="text-slate-200">Optional relationship</p>
              </div>

              <div className="border-t border-white/15 pt-4">
                <p className="text-[#A9CBD8] font-semibold mb-1">Project → Deliverable</p>
                <p className="text-slate-200">Required relationship</p>
              </div>

              <div className="border-t border-white/15 pt-4">
                <p className="text-[#A9CBD8] font-semibold mb-1">Deliverable → Task</p>
                <p className="text-slate-200">Required relationship</p>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  );
}
