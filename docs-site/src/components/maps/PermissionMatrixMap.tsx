const roles = [
  "Platform Owner / Super Admin",
  "Organization Admin",
  "Communications Lead",
  "Project Owner",
  "Contributor",
  "Reviewer",
  "External Reviewer",
  "Viewer",
];

const rows = [
  ["Organization settings", "Full", "Full", "None", "None", "None", "None", "None", "None"],
  ["User management", "Full", "Full", "Limited", "None", "None", "None", "None", "None"],
  ["Campaign management", "Full", "Full", "Full", "Limited", "None", "None", "None", "View"],
  ["Project create / edit", "Full", "Full", "Full", "Full", "Limited", "None", "None", "View"],
  ["Deliverable create / edit", "Full", "Full", "Full", "Full", "Limited", "View", "None", "View"],
  ["Task create / edit", "Full", "Full", "Full", "Limited", "Limited", "None", "None", "View"],
  ["Assign users", "Full", "Full", "Full", "Limited", "None", "None", "None", "None"],
  ["Upload / manage assets", "Full", "Full", "Full", "Limited", "Limited", "None", "Limited", "View"],
  ["Request approval", "Full", "Full", "Full", "Limited", "Limited", "None", "None", "None"],
  ["Approve deliverables", "Full", "Full", "Full", "Limited", "None", "Full", "Limited", "None"],
  ["Comment", "Full", "Full", "Full", "Full", "Full", "Full", "Limited", "View"],
  ["Generate magic links", "Full", "Full", "Full", "Limited", "None", "None", "None", "None"],
  ["Revoke magic links", "Full", "Full", "Full", "Limited", "None", "None", "None", "None"],
  ["Archive projects / deliverables", "Full", "Full", "Full", "Limited", "None", "None", "None", "None"],
  ["View audit logs", "Full", "Limited", "Limited", "None", "None", "None", "None", "None"],
];

const toneFor = (value: string) => {
  switch (value) {
    case "Full":
      return "bg-[var(--accent-blue-soft)] text-[var(--text-strong)] border-[var(--accent-blue-border)]";
    case "Limited":
      return "bg-[var(--accent-coral-soft)] text-[var(--text-strong)] border-[var(--accent-coral-border)]";
    case "View":
      return "bg-[var(--surface-soft)] text-[var(--text-body)] border-[var(--border-soft)]";
    default:
      return "bg-[var(--page-bg)] text-[var(--text-muted)] border-[var(--border-soft)]";
  }
};

export default function PermissionMatrixMap() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="overflow-hidden rounded-[1.5rem] border border-[var(--border-soft)] bg-white shadow-[0_4px_12px_rgba(15,23,42,0.06)]">
          <div className="overflow-x-auto">
            <table className="min-w-[1150px] border-collapse text-sm">
              <thead className="bg-[var(--panel-bg)] text-white">
                <tr>
                  <th className="sticky left-0 bg-[var(--panel-bg)] px-4 py-4 text-left font-semibold">Permission Area</th>
                  {roles.map((role) => (
                    <th key={role} className="px-4 py-4 text-left font-semibold text-slate-200">
                      {role}
                    </th>
                  ))}
                </tr>
              </thead>
              <tbody>
                {rows.map((row, rowIndex) => (
                  <tr key={row[0]} className={rowIndex % 2 === 0 ? "bg-white" : "bg-[var(--surface-soft)]"}>
                    <td className="sticky left-0 border-t border-[var(--border-soft)] bg-inherit px-4 py-4 font-semibold text-[var(--text-strong)]">
                      {row[0]}
                    </td>
                    {row.slice(1).map((value, cellIndex) => (
                      <td key={`${row[0]}-${cellIndex}`} className="border-t border-[var(--border-soft)] px-4 py-4">
                        <span className={`inline-flex rounded-full border px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] ${toneFor(value)}`}>
                          {value}
                        </span>
                      </td>
                    ))}
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">Matrix Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Tenant scope always applies</p>
              <p className="mt-1 text-slate-300">No role should escape the organization boundary without deliberate architecture.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Project role can extend permissions</p>
              <p className="mt-1 text-slate-300">Object-level roles may widen or narrow base access in context.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Magic links are explicitly scoped</p>
              <p className="mt-1 text-slate-300">External reviewers only get the narrow permissions tied to the specific link.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Audit access is restricted</p>
              <p className="mt-1 text-slate-300">Security-sensitive visibility should remain limited to trusted internal roles.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
