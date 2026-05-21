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
    entities: ["Campaign", "Project", "Deliverable", "Task"],
    relationships: [
      "Organization has many Campaigns and Projects",
      "Campaign has many Projects",
      "Project has many Deliverables",
      "Deliverable has many Tasks",
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
    ? "border-[#F1C7B2] bg-[#FFF4EE]"
    : "border-[#D8E1E6] bg-white";

export default function EntityRelationshipDiagram() {
  return (
    <div className="bg-[#F7F9FB] p-5 md:p-8">
      <div className="grid gap-6 xl:grid-cols-[minmax(0,1fr)_300px]">
        <div className="grid gap-4 lg:grid-cols-2">
          {groups.map((group) => (
            <div
              key={group.title}
              className={`rounded-[1.45rem] border p-5 shadow-[0_10px_25px_rgba(37,49,58,0.05)] ${groupClasses(group.tone)}`}
            >
              <p className="text-xs font-semibold uppercase tracking-[0.2em] text-[#568FA7]">{group.title}</p>
              <div className="mt-4 flex flex-wrap gap-3">
                {group.entities.map((entity) => (
                  <div key={entity} className="rounded-2xl border border-[#D8E1E6] bg-white px-4 py-3 text-sm font-semibold text-[#25313A]">
                    {entity}
                  </div>
                ))}
              </div>
              <div className="mt-5 space-y-2">
                {group.relationships.map((relationship) => (
                  <div key={relationship} className="rounded-xl border border-white/60 bg-white/70 px-4 py-3 text-sm leading-relaxed text-[#48535A]">
                    {relationship}
                  </div>
                ))}
              </div>
            </div>
          ))}
        </div>

        <aside className="rounded-[1.5rem] bg-[#25313A] p-6 text-white shadow-[0_12px_30px_rgba(37,49,58,0.12)]">
          <p className="text-xs font-semibold uppercase tracking-[0.22em] text-[#A9CBD8]">ERD Rules</p>
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
              <p className="font-semibold text-white">Product hierarchy drives work</p>
              <p className="mt-1 text-slate-300">Campaign, project, deliverable, and task remain the backbone of work relationships.</p>
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
