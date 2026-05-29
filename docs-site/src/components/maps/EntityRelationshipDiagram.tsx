const groups = [
  {
    title: "Identity & Access",
    tone: "blue",
    entities: ["Organization", "User", "Membership", "Role", "Permission"],
    relationships: [
      "Organization has many Memberships",
      "User has many Memberships",
      "Membership belongs to Organization and User",
    ],
  },
  {
    title: "Work Structure",
    tone: "blue",
    entities: ["StrategicContext", "Project", "Deliverable", "Task"],
    relationships: [
      "Organization has many StrategicContext records and Projects",
      "Project may associate with StrategicContext",
      "Project has many Deliverables",
      "Project has many Tasks",
      "Task may belong to Deliverable",
    ],
  },
  {
    title: "Assets & Approval",
    tone: "coral",
    entities: ["Asset", "AssetVersion", "Approval", "MagicLink"],
    relationships: [
      "Deliverable has many Assets",
      "Asset has many AssetVersions",
      "Deliverable has many Approvals",
      "MagicLinks scope to Deliverable or AssetVersion",
    ],
  },
  {
    title: "Activity & Audit",
    tone: "coral",
    entities: ["Comment", "Notification", "ActivityEvent", "AuditLog"],
    relationships: [
      "Project, Deliverable, Task, or Asset may have Comments",
      "User creates ActivityEvents",
      "ActivityEvents may generate Notifications",
      "AuditLog records security-sensitive actions",
    ],
  },
];

const groupClasses = (tone: string) =>
  tone === "coral"
    ? "border-[var(--accent-coral-border)] bg-[var(--accent-coral-soft)]"
    : "border-[var(--border-soft)] bg-white";

export default function EntityRelationshipDiagram() {
  return (
    <div className="bg-[var(--page-bg)] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="grid gap-4 lg:grid-cols-2">
          {groups.map((group) => (
            <div
              key={group.title}
              className={`rounded-[1.45rem] border p-5 shadow-[0_4px_12px_rgba(15,23,42,0.06)] ${groupClasses(group.tone)}`}
            >
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--accent-blue)]">{group.title}</p>
              <div className="mt-4 flex flex-wrap gap-3">
                {group.entities.map((entity) => (
                  <div key={entity} className="rounded-2xl border border-[var(--border-soft)] bg-white px-4 py-3 text-sm font-semibold text-[var(--text-strong)]">
                    {entity}
                  </div>
                ))}
              </div>
              <div className="mt-5 space-y-2">
                {group.relationships.map((relationship) => (
                  <div key={relationship} className="rounded-xl border border-white/60 bg-white/70 px-4 py-3 text-sm leading-relaxed text-[var(--text-body)]">
                    {relationship}
                  </div>
                ))}
              </div>
            </div>
          ))}
        </div>

        <aside className="rounded-[1.5rem] bg-[var(--panel-bg)] p-6 text-white shadow-[0_12px_32px_rgba(15,23,42,0.1)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[var(--panel-accent)]">ERD Rules</p>
          <div className="mt-4 space-y-4 text-sm leading-relaxed text-slate-200">
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Organization is the tenant boundary</p>
              <p className="mt-1 text-slate-300">The conceptual model starts with organization as the core scoped container.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Membership connects people</p>
              <p className="mt-1 text-slate-300">Users belong to organizations through memberships rather than a flat account assumption.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Operational model drives work</p>
              <p className="mt-1 text-slate-300">Projects, deliverables, and tasks remain the backbone; strategic context is associated separately.</p>
            </div>
            <div className="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
              <p className="font-semibold text-white">Activity and audit differ</p>
              <p className="mt-1 text-slate-300">Visible work history and security-sensitive records should not collapse into one entity.</p>
            </div>
          </div>
        </aside>
      </div>
    </div>
  );
}
