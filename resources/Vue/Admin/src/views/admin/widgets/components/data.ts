const auFlag = '/images/flags/au.svg'
const brFlag = '/images/flags/br.svg'
const caFlag = '/images/flags/ca.svg'
const deFlag = '/images/flags/de.svg'
const frFlag = '/images/flags/fr.svg'
const gbFlag = '/images/flags/gb.svg'
const inFlag = '/images/flags/in.svg'
const itFlag = '/images/flags/it.svg'
const jpFlag = '/images/flags/jp.svg'
const usFlag = '/images/flags/us.svg'

const user1 = '/images/users/user-1.jpg'
const user10 = '/images/users/user-10.jpg'
const user2 = '/images/users/user-2.jpg'
const user3 = '/images/users/user-3.jpg'
const user4 = '/images/users/user-4.jpg'
const user5 = '/images/users/user-5.jpg'
const user6 = '/images/users/user-6.jpg'
const user7 = '/images/users/user-7.jpg'
const user8 = '/images/users/user-8.jpg'
const user9 = '/images/users/user-9.jpg'

export type Widget1Type = {
  title: string
  icon: string
  className: string
  iconClassName: string
  description: string
  pointClassName: string
  count: {
    value: number
    prefix?: string
    suffix?: string
  }
  totalCount: string
}

export const widget1Data: Widget1Type[] = [
  {
    title: 'Orders',
    icon: 'shopping-cart',
    className: 'bg-success/10',
    iconClassName: 'bg-success/90',
    description: 'Total Orders',
    pointClassName: 'text-success',
    count: { value: 1250 },
    totalCount: '15,320',
  },
  {
    title: 'Revenue',
    icon: 'currency-dollar',
    className: 'bg-warning/10',
    iconClassName: 'bg-warning/90',
    description: 'Total Revenue',
    pointClassName: 'text-warning',
    count: { value: 98.7, prefix: '$', suffix: 'k' },
    totalCount: '$1.2M',
  },
  {
    title: 'Ratings',
    icon: 'star',
    className: 'bg-info/10',
    iconClassName: 'bg-info/90',
    description: 'Average Rating',
    pointClassName: 'text-info',
    count: { value: 4.8 },
    totalCount: '5k Reviews',
  },
  {
    title: 'Products',
    icon: 'box',
    className: 'bg-secondary/10',
    iconClassName: 'bg-secondary/90',
    description: 'Total Products',
    pointClassName: 'text-secondary',
    count: { value: 350 },
    totalCount: '750 Variants',
  },
]

export type Widget2Type = {
  title: string
  variant?: string
  className: string
  count: {
    value: number
    prefix?: string
    suffix?: string
  }
  percentage: number
  progressBg: string
  percentageIcon: string
  isPositive: boolean
}

export const widget2Data: Widget2Type[] = [
  {
    title: 'Total sales in period',
    variant: 'bg-primary',
    className: 'border-primary bg-primary/10',
    count: { value: 24500, prefix: '$' },
    percentage: 18.45,
    progressBg: 'bg-primary/25',
    percentageIcon: 'arrow-up',
    isPositive: true,
  },
  {
    title: 'Number of customers',
    variant: 'bg-secondary',
    className: 'border-default-300',
    count: { value: 1240 },
    percentage: 10.35,
    progressBg: 'bg-default-200',
    percentageIcon: 'arrow-down',
    isPositive: false,
  },
  {
    title: 'Average order value',
    variant: 'bg-secondary',
    className: 'border-default-300',
    count: { value: 65.49, prefix: '$', suffix: ' USD' },
    percentage: 5.92,
    progressBg: 'bg-default-200',
    percentageIcon: 'arrow-up',
    isPositive: true,
  },
  {
    title: 'Products sold in the period',
    variant: 'bg-secondary',
    className: 'border-secondary bg-secondary/10',
    count: { value: 3750 },
    percentage: 22.61,
    progressBg: 'bg-secondary/25',
    percentageIcon: 'bolt',
    isPositive: true,
  },
  {
    title: 'Total sales in period',
    variant: 'bg-warning',
    className: 'border-warning bg-warning/10',
    count: { value: 24500, prefix: '$' },
    percentage: 18.45,
    progressBg: 'bg-warning/25',
    percentageIcon: 'arrow-up',
    isPositive: true,
  },
  {
    title: 'Number of customers',
    variant: 'bg-secondary',
    className: 'border-default-300',
    count: { value: 1240 },
    percentage: 10.35,
    progressBg: 'bg-default-200',
    percentageIcon: 'arrow-down',
    isPositive: false,
  },
]

export type TrafficSource = {
  url: string
  views: string
  uniques: string
}

export const trafficSources: TrafficSource[] = [
  { url: '/dashboard', views: '9.8k', uniques: '8.5k' },
  { url: '/ecommerce-index', views: '8.2k', uniques: '7.1k' },
  { url: '/apps/projects-overview', views: '7.6k', uniques: '6.2k' },
  { url: '/pages/contact', views: '5.9k', uniques: '4.8k' },
  { url: '/support/faq', views: '5.2k', uniques: '4.3k' },
  { url: '/login', views: '4.7k', uniques: '3.9k' },
]

export type CountryStat = {
  rank: number
  name: string
  image: string
  visitors: number
  change: number
  className: string
}

export const topCountriesData: CountryStat[] = [
  { rank: 1, name: 'Germany', image: deFlag, visitors: 10412, change: 1.5, className: 'bg-success/15 text-success' },
  { rank: 2, name: 'France', image: frFlag, visitors: 8934, change: -0.8, className: 'bg-danger/15 text-danger' },
  { rank: 3, name: 'India', image: inFlag, visitors: 14217, change: 3.2, className: 'bg-success/15 text-success' },
  { rank: 4, name: 'United States', image: usFlag, visitors: 18522, change: 2.1, className: 'bg-success/15 text-success' },
  { rank: 5, name: 'United Kingdom', image: gbFlag, visitors: 7614, change: -1.2, className: 'bg-danger/15 text-danger' },
  { rank: 6, name: 'Canada', image: caFlag, visitors: 6221, change: 0.9, className: 'bg-success/15 text-success' },
  { rank: 7, name: 'Japan', image: jpFlag, visitors: 5785, change: 0.0, className: 'bg-warning/15 text-warning' },
  { rank: 8, name: 'Australia', image: auFlag, visitors: 4918, change: 1.1, className: 'bg-success/15 text-success' },
  { rank: 9, name: 'Brazil', image: brFlag, visitors: 3874, change: -0.5, className: 'bg-danger/15 text-danger' },
  { rank: 10, name: 'Italy', image: itFlag, visitors: 4105, change: 0.7, className: 'bg-success/15 text-success' },
]

export type CommentType = {
  name: string
  avatar: string
  date: string
  time: string
  message: string
  views: number
  likes: number
  comments: number
  reply?: CommentType[]
}

export const comments: CommentType[] = [
  {
    name: 'Liam Carter',
    avatar: user8,
    date: '15 Apr 2025',
    time: '09:20AM',
    message: 'Loving the new dashboard update! The UI feels much smoother and more intuitive now. Great job!',
    views: 1200,
    likes: 320,
    comments: 14,
    reply: [
      {
        name: 'Nina Bryant',
        avatar: user10,
        date: '15 Apr 2025',
        time: '10:00AM',
        message: 'Totally agree! The load speed is noticeably faster too.',
        views: 860,
        likes: 150,
        comments: 6,
      },
      {
        name: 'Sophie Allen',
        avatar: user3,
        date: '15 Apr 2025',
        time: '12:10PM',
        message: 'Hope we get more dark mode themes next!',
        views: 580,
        likes: 90,
        comments: 3,
      },
    ],
  },
]

export type MessageType = {
  message: string
  time: string
  fromUser: boolean
  avatar: string
}

export const messages: MessageType[] = [
  {
    message: 'Hey! Are you available for a quick call? 📞',
    time: '08:55 am',
    fromUser: false,
    avatar: user5,
  },
  {
    message: 'Sure, give me 5 minutes. Just wrapping something up.',
    time: '08:57 am',
    fromUser: true,
    avatar: user2,
  },
  {
    message: "Perfect. Let me know when you're ready 👍",
    time: '08:58 am',
    fromUser: false,
    avatar: user5,
  },
  {
    message: 'Ready now. Calling you!',
    time: '09:00 am',
    fromUser: true,
    avatar: user2,
  },
  {
    message: 'Thanks for your time earlier!',
    time: '09:45 am',
    fromUser: false,
    avatar: user5,
  },
  {
    message: 'Of course! It was a productive discussion.',
    time: '09:46 am',
    fromUser: true,
    avatar: user2,
  },
  {
    message: 'I’ll send over the updated files by noon.',
    time: '09:50 am',
    fromUser: false,
    avatar: user5,
  },
]

export type FileItemType = {
  name: string
  icon: string
  size: number
  users: string[]
}

export const fileItems: FileItemType[] = [
  {
    name: 'Meeting-Notes.docx',
    icon: 'file-text',
    size: 1200,
    users: [user4, user7, user1, user2],
  },
  {
    name: 'Design-Specs.pdf',
    icon: 'file-type-pdf',
    size: 3600,
    users: [user8, user2, user6, user9, user10],
  },
  {
    name: 'Assets-Package.zip',
    icon: 'file-type-zip',
    size: 7400,
    users: [user1, user6],
  },
  {
    name: 'Marketing-Plan.pptx',
    icon: 'file-type-ppt',
    size: 5000,
    users: [user10, user4, user1, user3, user6],
  },
  {
    name: 'Wireframe.png',
    icon: 'photo',
    size: 820,
    users: [user9],
  },
]

export type Widget3Type = {
  title: string
  description: string
  icon: string
  label: string
  className: string
  count: {
    value: number
    prefix?: string
    suffix?: string
  }
}

export const widget4Data: Widget3Type[] = [
  {
    title: 'Total Sales',
    description: 'Monthly Total Sales',
    icon: 'credit-card',
    label: 'Monthly',
    className: 'bg-success/15 text-success',
    count: { value: 320, prefix: '$', suffix: 'K' },
  },
  {
    title: 'Total Orders',
    description: 'Monthly Total Orders',
    icon: 'package',
    label: 'Monthly',
    className: 'bg-primary/15 text-primary',
    count: { value: 245 },
  },
  {
    title: 'New Customers',
    description: 'Monthly New Customers',
    icon: 'users',
    label: 'Monthly',
    className: 'bg-info/15 text-info',
    count: { value: 4382 },
  },
  {
    title: 'Revenue',
    description: 'Monthly Revenue',
    icon: 'chart-bar',
    label: 'Monthly',
    className: 'bg-warning/15 text-warning',
    count: { value: 89.45, prefix: '$', suffix: 'K' },
  },
]

export type Widget4Type = {
  title: string
  progress: number
  description: string
  status: string
}

export const widget6Data: Widget4Type[] = [
  {
    title: 'Backend API Integration',
    progress: 72.5,
    description: 'Estimated completion: 2 days.',
    status: 'in-progress',
  },
  {
    title: 'UI Design',
    progress: 100,
    description: 'Delivered yesterday at 5:00 pm.',
    status: 'completed',
  },
  {
    title: 'Database Optimization',
    progress: 45,
    description: 'Next review: Monday 10:00 am.',
    status: 'pending',
  },
  {
    title: 'Server Uptime',
    progress: 99.9,
    description: 'Last downtime: 7 days ago.',
    status: 'stable',
  },
]

export type Widget5Type = {
  title: string
  icon: string
  className: string
  count: {
    value: number
    prefix?: string
    suffix?: string
  }
}

export const widget7Data: Widget5Type[] = [
  {
    title: 'Total Property Value',
    icon: 'building-skyscraper',
    className: 'bg-primary/15 text-primary',
    count: { value: 150, prefix: '$', suffix: 'M' },
  },
  {
    title: 'Properties Sold',
    icon: 'home-dollar',
    className: 'bg-success/15 text-success',
    count: { value: 320 },
  },
  {
    title: 'Active Listings',
    icon: 'building-store',
    className: 'bg-warning/15 text-warning',
    count: { value: 180 },
  },
  {
    title: 'Agents Available',
    icon: 'users-group',
    className: 'bg-info/15 text-info',
    count: { value: 85 },
  },
  {
    title: 'Upcoming Viewings',
    icon: 'calendar-time',
    className: 'bg-danger/15 text-danger',
    count: { value: 42 },
  },
  {
    title: 'New Constructions',
    icon: 'building-warehouse',
    className: 'bg-secondary/15 text-secondary',
    count: { value: 27 },
  },
]
