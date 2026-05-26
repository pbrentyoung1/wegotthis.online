import type { ColorVariant } from 'bootstrap-vue-next'
import type { EChartsOption } from 'echarts'
import { getColor } from '@/utils/helpers'

const generateRandomEChartData = (dataName: string[]) => {
  const randomData = dataName.map((name) => ({
    name: name,
    value: Math.floor(Math.random() * 100) + 1,
  }))
  const total = randomData.reduce((sum, item) => sum + item.value, 0)
  randomData.forEach((item) => {
    item.value = (item.value / total) * 100
  })
  return randomData
}

export type StatisticType = {
  title: string
  value: number | string
  suffix?: string
  prefix?: string
  badgeText: string
  badgeVariant: 'primary' | 'secondary' | 'light'
  icon: string
  iconBg?: string
  pointColor: string
  description: string
  total: string
}

export const statisticData: StatisticType[] = [
  {
    title: 'My Tasks',
    value: 124,
    badgeText: '+3 New',
    badgeVariant: 'primary',
    icon: 'tabler:checklist',
    pointColor: 'primary',
    description: 'Total Tasks',
    total: '12,450',
  },
  {
    title: 'Messages',
    value: 69.5,
    suffix: 'k',
    badgeText: '+5 New',
    badgeVariant: 'secondary',
    icon: 'tabler:message-circle',
    pointColor: 'secondary',
    description: 'Total Messages',
    total: '32.1M',
  },
  {
    title: 'Approvals',
    value: 32,
    badgeText: '+2 New',
    badgeVariant: 'light',
    icon: 'tabler:file-check',
    pointColor: 'primary',
    description: 'Total Approvals',
    total: '1,024',
  },
  {
    title: 'Clients',
    value: 184,
    badgeText: '+4 New',
    badgeVariant: 'secondary',
    icon: 'tabler:users',
    pointColor: 'secondary',
    description: 'Total Clients',
    total: '9,835',
  },
  {
    title: 'Revenue',
    value: 125.5,
    prefix: '$',
    suffix: 'k',
    badgeText: '+1.5%',
    badgeVariant: 'primary',
    icon: 'tabler:credit-card',
    pointColor: 'primary',
    description: 'Total Revenue',
    total: '$12.5M',
  },
]

export type QuarterlyReportType = {
  id: number
  quarter: string
  period: string
  revenue: string
  expense: string
  margin: string
}

export const quarterlyReportData: QuarterlyReportType[] = [
  {
    id: 1,
    quarter: 'Quarter 1',
    period: 'January - March 2024',
    revenue: '$210k',
    expense: '$165k',
    margin: '$45k',
  },
  {
    id: 2,
    quarter: 'Quarter 2',
    period: 'April - June 2024',
    revenue: '$225k',
    expense: '$175k',
    margin: '$50k',
  },
  {
    id: 3,
    quarter: 'Quarter 3',
    period: 'July - September 2024',
    revenue: '$240k',
    expense: '$190k',
    margin: '$50k',
  },
  {
    id: 4,
    quarter: 'Quarter 4',
    period: 'October - December 2024',
    revenue: '$260k',
    expense: '$210k',
    margin: '$50k',
  },
]

export type ProjectStatType = {
  id: number
  title: string
  count: string
  percentage: number
  variant: 'secondary' | 'info' | 'primary' | 'success' | 'warning' | 'danger' | 'light' | 'dark'
  showPercentage: boolean
}
export const projectStatData: ProjectStatType[] = [
  {
    id: 1,
    title: 'Completed Projects',
    count: '+ 180',
    percentage: 54.2,
    variant: 'secondary',
    showPercentage: true,
  },
  {
    id: 2,
    title: 'Ongoing Projects',
    count: '+ 120',
    percentage: 36.15,
    variant: 'info',
    showPercentage: true,
  },
  {
    id: 3,
    title: 'Pending Approvals',
    count: '+ 32',
    percentage: 9.65,
    variant: 'secondary',
    showPercentage: true,
  },
]

export type TimelineEventType = {
  icon: string
  iconColor: string
  title: string
  time: string
  description: string
  tag: string
  tagVariant: string
  user: {
    name: string
    image: string
    href: string
  }
  hasDivider: boolean
}

export const timelineEventData: TimelineEventType[] = [
  {
    icon: 'tabler:rocket',
    iconColor: 'primary',
    title: 'New Feature Released',
    time: 'Today at 3:45 PM',
    description: 'Launched the real-time chat feature across all user accounts.',
    tag: 'Deploy',
    tagVariant: 'info',
    user: {
      name: 'Natalie Brooks',
      image: '/images/users/user-1.jpg',
      href: '/pages/profile',
    },
    hasDivider: true,
  },
  {
    icon: 'tabler:calendar-event',
    iconColor: 'warning',
    title: 'Team Sync-Up',
    time: 'Today at 2:00 PM',
    description: 'Reviewed sprint progress and discussed remaining tasks with the dev team.',
    tag: 'Meeting',
    tagVariant: 'secondary',
    user: {
      name: 'Oliver Grant',
      image: '/images/users/user-6.jpg',
      href: '/pages/profile',
    },
    hasDivider: true,
  },
  {
    icon: 'tabler:palette',
    iconColor: 'success',
    title: 'UI Design Review',
    time: 'Today at 1:15 PM',
    description: 'Updated component spacing and colors for improved accessibility.',
    tag: 'Design',
    tagVariant: 'success',
    user: {
      name: 'Clara Jensen',
      image: '/images/users/user-9.jpg',
      href: '/pages/profile',
    },
    hasDivider: true,
  },
  {
    icon: 'tabler:database',
    iconColor: 'danger',
    title: 'Database Optimization',
    time: 'Today at 12:30 PM',
    description: 'Improved DB query performance, reducing load time by 35%.',
    tag: 'Backend',
    tagVariant: 'danger',
    user: {
      name: 'Leo Armstrong',
      image: '/images/users/user-10.jpg',
      href: '/pages/profile',
    },
    hasDivider: true,
  },
  {
    icon: 'tabler:shield-check',
    iconColor: 'info',
    title: 'Security Audit Completed',
    time: 'Today at 11:00 AM',
    description: 'Completed internal security audit with no critical issues found.',
    tag: 'Audit',
    tagVariant: 'warning',
    user: {
      name: 'Liam Carter',
      image: '/images/users/user-8.jpg',
      href: '/pages/profile',
    },
    hasDivider: true,
  },
  {
    icon: 'tabler:user-plus',
    iconColor: 'success',
    title: 'New Team Member Joined',
    time: 'Today at 10:15 AM',
    description: 'Michael Lee has joined the development team as a Frontend Engineer.',
    tag: 'Onboarding',
    tagVariant: 'primary',
    user: {
      name: 'Emma Davis',
      image: '/images/users/user-7.jpg',
      href: '/pages/profile',
    },
    hasDivider: false,
  },
]

export type DiscussionMessageType = {
  id: number
  user: {
    name: string
    image?: string
  }

  timeAgo: string
  message: string
}

export const discussionMessageData: DiscussionMessageType[] = [
  {
    id: 1,
    user: {
      name: 'Alex Johnson',
      image: '/images/users/user-8.jpg',
    },
    timeAgo: '10m ago',
    message: 'Excited to share our latest project update with everyone!',
  },
  {
    id: 2,
    user: {
      name: 'Den Nowdya',
    },
    timeAgo: '1h ago',
    message: 'Looking forward to the upcoming team meeting.',
  },
  {
    id: 3,
    user: {
      name: 'Michael Brown',
      image: '/images/users/user-10.jpg',
    },
    timeAgo: '16h ago',
    message: "Great insights shared in today's brainstorming session!",
  },
  {
    id: 4,
    user: {
      name: 'Emily Watson',
      image: '/images/users/user-1.jpg',
    },
    timeAgo: '20h ago',
    message: 'Wrapping up an amazing design concept for the client.',
  },
  {
    id: 5,
    user: {
      name: 'Monica Smith',
      image: '/images/users/user-6.jpg',
    },
    timeAgo: '2 days ago',
    message: 'Testing some new UI enhancements—excited for feedback!',
  },
]

export type ActivityItemType = {
  text: string
  time: string
  badgeVariant: ColorVariant
  badgeText?: 'dark' | 'light'
}

export const activityItemData: ActivityItemType[] = [
  {
    text: 'Reviewed project proposal',
    time: '09:30 AM',
    badgeVariant: 'primary',
  },
  {
    text: 'Team stand-up meeting',
    time: '11:00 AM',
    badgeVariant: 'info',
  },
  {
    text: 'Sent client invoice',
    time: '01:15 PM',
    badgeVariant: 'secondary',
  },
  {
    text: 'Responded to support tickets',
    time: '03:40 PM',
    badgeVariant: 'light',
    badgeText: 'dark',
  },
  {
    text: 'Finalized design mockups',
    time: '05:10 PM',
    badgeVariant: 'warning',
    badgeText: 'light',
  },
]

export const getPieEchartOptions = (): EChartsOption => {
  const charityData = generateRandomEChartData(['Charity A', 'Charity B', 'Charity C'])
  return {
    tooltip: { show: false },
    series: [
      {
        type: 'pie',
        radius: ['60%', '100%'],
        // @ts-expect-error hoverAnimation is a valid property
        hoverAnimation: false,
        label: { show: false },
        labelLine: { show: false },
        data: charityData.map((item, index) => ({
          value: item.value,
          itemStyle: {
            color: index === 0 ? getColor('primary') : index === 1 ? getColor('secondary') : '#bbcae14d',
          },
        })),
      },
    ],
  }
}

export const getRevenueChartOptions = (): EChartsOption => {
  const xLabels = Array.from({ length: 15 }, (_, i) => `Day ${i + 1}`)

  return {
    textStyle: { fontFamily: getComputedStyle(document.body).fontFamily },
    tooltip: {
      trigger: 'axis',
      padding: [5, 0],
      backgroundColor: getColor('secondary-bg'),
      borderColor: getColor('border-color'),
      textStyle: { color: getColor('light-text-emphasis') },
      borderWidth: 1,
      transitionDuration: 0.125,
      axisPointer: { type: 'none' },
      shadowBlur: 2,
      shadowColor: 'rgba(76, 76, 92, 0.15)',
      shadowOffsetX: 0,
      shadowOffsetY: 1,
    },
    xAxis: {
      type: 'category',
      data: xLabels,
      boundaryGap: false,
      axisLine: { show: false },
      axisTick: { show: false },
      axisLabel: { color: getColor('secondary-color'), margin: 15 },
      splitLine: { show: false },
    },
    yAxis: {
      max: 1800,
      type: 'value',
      splitLine: { lineStyle: { color: '#676b891f', type: 'dashed' } },
      boundaryGap: [0, '100%'],
      axisLabel: {
        show: true,
        color: getColor('secondary-color'),
        margin: 15,
        formatter: function (value: any) {
          return '$' + value
        },
      },
      axisTick: { show: false },
      axisLine: { show: false },
    },
    series: [
      {
        name: 'Total Revenue',
        type: 'line',
        smooth: true,
        symbolSize: 2,
        itemStyle: {
          color: getColor('primary'),
          borderColor: getColor('primary'),
          borderWidth: 2,
        },
        areaStyle: {
          opacity: 0.2,
          color: getColor('primary'),
        },
        lineStyle: {
          color: getColor('primary'),
        },
        symbol: 'circle',
        stack: 'data',
        data: [45, 88, 120, 160, 210, 240, 350, 420, 380, 500, 640, 710, 890, 1150, 1200],
      },
      {
        name: 'Orders',
        type: 'line',
        smooth: true,
        symbolSize: 2,
        itemStyle: {
          color: getColor('secondary'),
          borderColor: getColor('secondary'),
          borderWidth: 2,
        },
        areaStyle: {
          opacity: 0.2,
          color: getColor('secondary'),
        },
        lineStyle: {
          color: getColor('secondary'),
        },
        symbol: 'circle',
        stack: 'data',
        data: [15, 30, 35, 50, 55, 75, 95, 120, 135, 160, 180, 210, 250, 390, 450],
      },
    ],
    grid: {
      right: 0,
      left: 2,
      bottom: -3,
      top: 5,
      containLabel: true,
    },
  }
}

export const getProgressChartOptions = (): EChartsOption => {
  return {
    tooltip: {
      trigger: 'item',
      padding: [8, 15],
      backgroundColor: getColor('secondary-bg'),
      borderColor: getColor('border-color'),
      textStyle: { color: getColor('light-text-emphasis') },
      borderWidth: 1,
      transitionDuration: 0.125,
      axisPointer: { type: 'none' },
      shadowBlur: 2,
      shadowColor: 'rgba(76, 76, 92, 0.15)',
      shadowOffsetX: 0,
      shadowOffsetY: 1,
    },
    textStyle: {
      fontFamily: getComputedStyle(document.body).fontFamily,
    },
    series: [
      {
        name: 'Project Progress',
        type: 'pie',
        radius: [60, 100],
        center: ['50%', '50%'],
        roseType: 'area',
        itemStyle: {
          borderRadius: 8,
        },
        label: {
          color: getColor('secondary-color'),
        },
        data: [
          { value: 85, name: 'Website Redesign', itemStyle: { color: getColor('primary') } },
          {
            value: 70,
            name: 'Mobile App',
            itemStyle: { color: getColor('secondary') },
          },
          { value: 55, name: 'CRM Integration', itemStyle: { color: getColor('info') } },
          {
            value: 60,
            name: 'Product Launch',
            itemStyle: { color: getColor('success') },
          },
          { value: 75, name: 'Backend Refactor', itemStyle: { color: getColor('light') } },
          {
            value: 50,
            name: 'Client Dashboard',
            itemStyle: { color: getColor('warning') },
          },
        ],
      },
    ],
  }
}
