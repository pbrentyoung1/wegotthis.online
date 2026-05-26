import type { EChartsOption, TooltipComponentFormatterCallbackParams } from 'echarts'
import { getColor } from '~/utils/helpers'

const user10 = '/images/users/user-10.jpg'
const user1 = '/images/users/user-1.jpg'
const user4 = '/images/users/user-4.jpg'
const user6 = '/images/users/user-6.jpg'
const user7 = '/images/users/user-7.jpg'
const user8 = '/images/users/user-8.jpg'
const user9 = '/images/users/user-9.jpg'

export type MessageType = {
  title: string
  time: string
  className: string
}

export const messageData: MessageType[] = [
  {
    title: 'Reviewed project proposal',
    time: '09:30 AM',
    className: 'bg-primary text-white ',
  },
  {
    title: 'Team stand-up meeting',
    time: '11:00 AM',
    className: 'bg-info text-white ',
  },
  {
    title: 'Sent client invoice',
    time: '01:15 PM',
    className: 'bg-secondary text-white ',
  },
  {
    title: 'Responded to support tickets',
    time: '03:40 PM',
    className: 'bg-light text-black',
  },
  {
    title: 'Finalized design mockups',
    time: '05:10 PM',
    className: 'bg-warning text-white ',
  },
]

export const revenueChartOptions = (): EChartsOption => ({
  textStyle: {
    fontFamily: getComputedStyle(document.body).fontFamily,
  },
  tooltip: {
    trigger: 'axis',
    padding: [5, 0],
    backgroundColor: getColor('card'),
    borderColor: getColor('default-200'),
    textStyle: { color: getColor('default-600') },
    borderWidth: 1,
    transitionDuration: 0.125,
    axisPointer: { type: 'none' },
    shadowBlur: 2,
    shadowColor: 'rgba(76, 76, 92, 0.15)',
    shadowOffsetX: 0,
    shadowOffsetY: 1,
    formatter: (params: TooltipComponentFormatterCallbackParams) => {
      const items = Array.isArray(params) ? params : [params]
      const title = items[0]?.name
      let content = `<div style="font-size: 14px; font-weight: 600; text-transform: uppercase; border-bottom: 1px solid ${getColor('default-200')}; margin-bottom: 8px; padding: 3px 10px 8px;">${title}</div>`
      items.forEach((item) => {
        const valueLabel = item.seriesName === 'Total Revenue' ? `$${item.value}` : `${item.value} sales`
        content += `<div style="margin-top: 4px; padding: 3px 15px;">
                          <span style="display:inline-block;margin-right:5px;border-radius:50%;width:10px;height:10px;background-color:${item.color};"></span>
                          ${item.seriesName} : <strong>${valueLabel}</strong>
                        </div>`
      })
      return content
    },
  },
  xAxis: {
    type: 'category',
    data: Array.from({ length: 15 }, (_, i) => `Day ${i + 1}`),
    boundaryGap: false,
    axisLine: {
      show: false,
    },
    axisTick: { show: false },
    axisLabel: {
      color: getColor('body-color'),
      margin: 15,
    },
    splitLine: { show: false },
  },
  yAxis: {
    type: 'value',
    splitLine: {
      lineStyle: {
        color: getColor('default-200'),
        type: 'dashed',
      },
    },
    //  boundaryGap: false,
    axisLabel: {
      show: true,
      color: getColor('body-color'),
      margin: 15,
      formatter: function (value) {
        return '$' + value // Format x-axis labels with a dollar sign
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
    left: 5,
    bottom: 5,
    top: 0,
    containLabel: true,
  },
})

export const projectProgressChartOptions = (): EChartsOption => ({
  tooltip: {
    trigger: 'item',
    padding: [8, 15],
    backgroundColor: getColor('card'),
    borderColor: getColor('default-200'),
    textStyle: { color: getColor('default-600') },
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
        color: getColor('body-color'),
      },
      data: [
        { value: 85, name: 'Website Redesign', itemStyle: { color: getColor('chart-primary') } },
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
})

export type StatisticType = {
  title: string
  description: string
  badge: string
  icon: string
  count: { value: number; prefix?: string; suffix?: string }
  badgeClassName: string
  className: string
  totalCount: { value: number; prefix?: string; suffix?: string }
}

export const statisticData: StatisticType[] = [
  {
    title: 'My Tasks',
    description: 'Total Tasks',
    badge: '+3 New',
    icon: 'tabler:checklist',
    count: { value: 124 },
    badgeClassName: 'bg-primary/10 text-primary',
    className: 'text-primary',
    totalCount: { value: 12450 },
  },
  {
    title: 'Messages',
    description: 'Total Messages',
    badge: '+5 New',
    icon: 'tabler:message-circle',
    count: { value: 69.5 },
    badgeClassName: 'bg-secondary/10 text-secondary',
    className: 'text-secondary',
    totalCount: { value: 32.1, suffix: 'M' },
  },
  {
    title: 'Approvals',
    description: 'Total Approvals',
    badge: '+2 New',
    icon: 'tabler:file-check',
    count: { value: 32 },
    badgeClassName: 'bg-light text-text-default-600 ',
    className: 'text-primary',
    totalCount: { value: 1024 },
  },
  {
    title: 'Clients',
    description: 'Total Clients',
    badge: '+4 New',
    icon: 'tabler:users',
    count: { value: 184 },
    badgeClassName: 'bg-secondary/10 text-secondary',
    className: 'text-secondary',
    totalCount: { value: 9835 },
  },
  {
    title: 'Revenue',
    description: 'Total Revenue',
    badge: '$125.50k',
    icon: 'tabler:credit-card',
    count: { value: 125.5, suffix: 'k' },
    badgeClassName: 'bg-primary/10 text-primary',
    className: 'text-primary',
    totalCount: { prefix: '$', value: 12.5, suffix: 'M' },
  },
]

function generateRandomData() {
  const dataName = ['A', 'B', 'C']
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

export type QuarterlyReportType = {
  quarter: string
  period: string
  revenue: string
  expense: string
  margin: string
  chartOptions?: () => EChartsOption
}

export const quarterlyReportData: QuarterlyReportType[] = [
  {
    quarter: 'Quarter 1',
    period: 'January - March 2024',
    revenue: '$210k',
    expense: '$165k',
    margin: '$45k',
    chartOptions: () => ({
      tooltip: { show: false },
      series: [
        {
          type: 'pie',
          radius: ['65%', '100%'],
          hoverAnimation: false,
          label: { show: false },
          labelLine: { show: false },
          data: generateRandomData().map((item, index) => ({
            value: item.value,
            itemStyle: {
              color: index === 0 ? getColor('chart-primary') : index === 1 ? getColor('chart-secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
  {
    quarter: 'Quarter 2',
    period: 'April - June 2024',
    revenue: '$225k',
    expense: '$175k',
    margin: '$50k',
    chartOptions: () => ({
      tooltip: { show: false },
      series: [
        {
          type: 'pie',
          radius: ['65%', '100%'],
          hoverAnimation: false,
          label: { show: false },
          labelLine: { show: false },
          data: generateRandomData().map((item, index) => ({
            value: item.value,
            itemStyle: {
              color: index === 0 ? getColor('chart-primary') : index === 1 ? getColor('chart-secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
  {
    quarter: 'Quarter 3',
    period: 'July - September 2024',
    revenue: '$240k',
    expense: '$190k',
    margin: '$50k',
    chartOptions: () => ({
      tooltip: { show: false },
      series: [
        {
          type: 'pie',
          radius: ['65%', '100%'],
          hoverAnimation: false,
          label: { show: false },
          labelLine: { show: false },
          data: generateRandomData().map((item, index) => ({
            value: item.value,
            itemStyle: {
              color: index === 0 ? getColor('chart-primary') : index === 1 ? getColor('chart-secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
  {
    quarter: 'Quarter 4',
    period: 'October - December 2024',
    revenue: '$260k',
    expense: '$200k',
    margin: '$60k',
    chartOptions: () => ({
      tooltip: { show: false },
      series: [
        {
          type: 'pie',
          radius: ['65%', '100%'],
          hoverAnimation: false,
          label: { show: false },
          labelLine: { show: false },
          data: generateRandomData().map((item, index) => ({
            value: item.value,
            itemStyle: {
              color: index === 0 ? getColor('chart-primary') : index === 1 ? getColor('chart-secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
]

export type ProjectStatusType = {
  title: string
  value: number
  progress: number
  className: string
}

export const projectStatusData: ProjectStatusType[] = [
  {
    title: 'Completed Projects',
    value: 180,
    progress: 54.2,
    className: 'bg-secondary',
  },
  {
    title: 'Ongoing Projects',
    value: 120,
    progress: 36.15,
    className: 'bg-info',
  },
  {
    title: 'Pending Approvals',
    value: 32,
    progress: 9.65,
    className: 'bg-secondary',
  },
]

export type TimelineItemType = {
  icon: string
  className: string
  title: string
  badge: {
    text: string
    className: string
  }
  time: string
  description: string
  image: string
  name: string
}

export const timelineData: TimelineItemType[] = [
  {
    icon: 'tabler:rocket',
    className: 'text-primary',
    title: 'New Feature Released',
    badge: {
      text: 'Deploy',
      className: 'bg-info/15 text-info',
    },
    time: 'Today at 3:45 PM',
    description: 'Launched the real-time chat feature across all user accounts.',
    image: user6,
    name: 'Natalie Brooks',
  },
  {
    icon: 'tabler:calendar-event',
    className: 'text-warning',
    title: 'Team Sync-Up',
    badge: {
      text: 'Meeting',
      className: 'bg-secondary/15 text-secondary',
    },
    time: 'Today at 2:00 PM',
    description: 'Reviewed sprint progress and discussed remaining tasks with the dev team.',
    image: user4,
    name: 'Oliver Grant',
  },
  {
    icon: 'tabler:palette',
    className: 'text-success',
    title: 'UI Design Review',
    badge: {
      text: 'Design',
      className: 'bg-success/15 text-success',
    },
    time: 'Today at 1:15 PM',
    description: 'Updated component spacing and colors for improved accessibility.',
    image: user9,
    name: 'Clara Jensen',
  },
  {
    icon: 'tabler:database',
    className: 'text-danger',
    title: 'Database Optimization',
    badge: {
      text: 'Backend',
      className: 'bg-danger/15 text-danger',
    },
    time: 'Today at 12:30 PM',
    description: 'Improved DB query performance, reducing load time by 35%.',
    image: user10,
    name: 'Leo Armstrong',
  },
  {
    icon: 'tabler:shield-check',
    className: 'text-info',
    title: 'Security Audit Completed',
    badge: {
      text: 'Audit',
      className: 'bg-warning/15 text-warning',
    },
    time: 'Today at 11:00 AM',
    description: 'Completed internal security audit with no critical issues found.',
    image: user8,
    name: 'Liam Carter',
  },
  {
    icon: 'tabler:user-plus',
    className: 'text-success',
    title: 'New Team Member Joined',
    badge: {
      text: 'Onboarding',
      className: 'bg-primary/15 text-primary',
    },
    time: 'Today at 10:15 AM',
    description: 'Michael Lee has joined the development team as a Frontend Engineer.',
    image: user7,
    name: 'Emma Davis',
  },
]

export type UserMessageType = {
  name: string
  time: string
  message: string
  image?: string
}

export const userMessageData: UserMessageType[] = [
  {
    name: 'Alex Johnson',
    time: '10m ago',
    message: 'Excited to share our latest project update with everyone!',
    image: user8,
  },
  {
    name: 'Den Nowdya',
    time: '1h ago',
    message: 'Looking forward to the upcoming team meeting.',
  },
  {
    name: 'Michael Brown',
    time: '16h ago',
    message: "Great insights shared in today's brainstorming session!",
    image: user10,
  },
  {
    name: 'Emily Watson',
    time: '20h ago',
    message: 'Wrapping up an amazing design concept for the client.',
    image: user1,
  },
  {
    name: 'Monica Smith',
    time: '2 days ago',
    message: 'Testing some new UI enhancements—excited for feedback!',
    image: user6,
  },
]
