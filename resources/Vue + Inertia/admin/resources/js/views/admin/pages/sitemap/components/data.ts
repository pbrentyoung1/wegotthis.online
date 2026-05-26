export type PageItemType = {
  label: string
  icon?: string
  variant?: string
  children?: {
    label: string
  }[]
}

export const dashboardSitemapData: PageItemType[] = [
  {
    label: 'Dashboards',
    children: [{ label: 'Analytics' }, { label: 'CRM' }, { label: 'Sales' }, { label: 'Minimal' }, { label: 'eCommerce' }],
  },
  {
    label: 'Profile',
    children: [{ label: 'Overview' }, { label: 'Edit' }, { label: 'Security' }],
  },
  { label: 'Help Center' },
  { label: 'Login' },
  { label: 'Register' },
]

export const applicationsData: PageItemType[] = [
  {
    label: 'Calendar',
    icon: 'calendar',
  },
  {
    label: 'Email',
    icon: 'mail',
    children: [{ label: 'Inbox' }, { label: 'Read' }, { label: 'Compose' }],
  },
  {
    label: 'Users',
    icon: 'users',
    children: [{ label: 'List' }, { label: 'Add User' }, { label: 'Roles' }],
  },
  {
    label: 'Projects',
    icon: 'briefcase',
    children: [{ label: 'Overview' }, { label: 'Create' }, { label: 'Tasks' }],
  },
]

export const reportsSettingsData: PageItemType[] = [
  {
    label: 'Reports',
    icon: 'chart-bar',
    variant: 'primary',
    children: [{ label: 'Sales' }, { label: 'Users' }, { label: 'Performance' }],
  },
  {
    label: 'Billing',
    icon: 'wallet',
    variant: 'info',
    children: [{ label: 'Invoices' }, { label: 'Payments' }, { label: 'Methods' }],
  },
  {
    label: 'Settings',
    icon: 'settings',
    variant: 'danger',
    children: [{ label: 'General' }, { label: 'Appearance' }, { label: 'Integrations' }, { label: 'Audit Logs' }],
  },
  {
    label: 'Logout',
    icon: 'logout',
  },
]
