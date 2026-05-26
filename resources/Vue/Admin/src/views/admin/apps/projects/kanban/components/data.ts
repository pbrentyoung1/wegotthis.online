import kanban1 from '/images/kanban/img-1.png'
import kanban2 from '/images/kanban/img-2.png'
import kanban3 from '/images/kanban/img-3.png'
import kanban4 from '/images/kanban/img-4.png'
import user1 from '/images/users/user-1.jpg'
import user2 from '/images/users/user-2.jpg'
import user3 from '/images/users/user-3.jpg'
import user4 from '/images/users/user-4.jpg'
import user5 from '/images/users/user-5.jpg'
import user6 from '/images/users/user-6.jpg'
import user7 from '/images/users/user-7.jpg'
import user8 from '/images/users/user-8.jpg'
import user9 from '/images/users/user-9.jpg'

export type KanbanTaskType = {
  category: {
    name: string
    badgeClassName: string
  }
  className: string
  title: string
  users: string[]
  date: string
  image?: string
  status: 'todo' | 'in-progress' | 'done' | 'in-review'
  progress?: number
}

export const kanbanTaskData: KanbanTaskType[] = [
  {
    category: {
      name: 'Design',
      badgeClassName: 'bg-success/15 text-success',
    },
    className: 'bg-success',
    title: 'AI Analytics Dashboard',
    users: [user2, user3, user5, user1],
    date: '25 May, 2025',
    status: 'todo',
    progress: 65,
  },
  {
    category: {
      name: 'Development',
      badgeClassName: 'bg-warning/15 text-warning',
    },
    className: 'bg-warning',
    title: 'Marketing Landing Page Redesign',
    users: [user6, user4, user8],
    date: '10 Jun, 2025',
    image: kanban1,
    status: 'todo',
  },
  {
    category: {
      name: 'UI/UX',
      badgeClassName: 'bg-info/15 text-info',
    },
    className: 'bg-info',
    title: 'E-Commerce Website Redesign',
    users: [user4, user6, user7, user8],
    date: '28 May, 2025',
    status: 'todo',
  },
  {
    category: {
      name: 'App Development',
      badgeClassName: 'bg-warning/15 text-warning',
    },
    className: 'bg-warning',
    title: 'Mobile App Redesign',
    users: [user1, user2, user3],
    date: '30 May, 2025',
    status: 'todo',
    progress: 80,
  },
  {
    category: {
      name: 'Marketing',
      badgeClassName: 'bg-purple/15 text-purple',
    },
    className: 'bg-purple',
    title: 'CRM System Upgrade',
    users: [user4],
    date: '30 May, 2025',
    image: kanban2,
    status: 'todo',
    progress: 45,
  },

  {
    category: {
      name: 'Testing',
      badgeClassName: 'bg-info/15 text-info',
    },
    className: 'bg-info',
    title: 'E-commerce Website QA Testing',
    users: [user3, user7, user9],
    date: '18 Jun, 2025',
    status: 'in-progress',
  },
  {
    category: {
      name: 'UI/UX',
      badgeClassName: 'bg-info/15 text-info',
    },
    className: 'bg-info',
    title: 'Mobile App Redesign',
    users: [user5, user2, user3, user9],
    date: '10 Jun, 2025',
    status: 'in-progress',
  },
  {
    category: {
      name: 'UI/UX Design',
      badgeClassName: 'bg-success/15 text-success',
    },
    className: 'bg-success',
    title: 'Website User Experience Overhaul',
    users: [user4, user5, user6],
    date: '15 June, 2025',
    status: 'in-progress',
    progress: 55,
  },
  {
    category: {
      name: 'Marketing',
      badgeClassName: 'bg-danger/15 text-danger',
    },
    className: 'bg-danger',
    title: 'Customer Engagement Platform Development',
    users: [user5, user6],
    date: '10 June, 2025',
    status: 'in-progress',
  },

  {
    category: {
      name: 'Design',
      badgeClassName: 'bg-success/15 text-success',
    },
    className: 'bg-success',
    title: 'AI Analytics Dashboard',
    users: [user2, user3, user5, user1],
    date: '25 May, 2025',
    image: kanban3,
    status: 'in-review',
    progress: 65,
  },
  {
    category: {
      name: 'Development',
      badgeClassName: 'bg-warning/15 text-warning',
    },
    className: 'bg-warning',
    title: 'Marketing Landing Page Redesign',
    users: [user6, user4, user8],
    date: '10 Jun, 2025',
    status: 'in-review',
  },
  {
    category: {
      name: 'UI/UX',
      badgeClassName: 'bg-info/15 text-info',
    },
    className: 'bg-info',
    title: 'E-Commerce Website Redesign',
    users: [user4, user6, user7, user8],
    date: '28 May, 2025',
    status: 'in-review',
  },
  {
    category: {
      name: 'Testing',
      badgeClassName: 'bg-info/15 text-info',
    },
    className: 'bg-info',
    title: 'E-commerce Website QA Testing',
    users: [user3, user7, user9],
    date: '18 Jun, 2025',
    status: 'done',
  },
  {
    category: {
      name: 'UI/UX',
      badgeClassName: 'bg-warning/15 text-warning',
    },
    className: 'bg-info',
    title: 'Mobile App Redesign',
    users: [user5, user2, user3, user9],
    date: '10 Jun, 2025',
    image: kanban4,
    status: 'done',
  },
]
