import type { EChartsOption } from 'echarts'
import { getColor } from '~/utils/helpers'

const product1 = '/images/products/1.png'
const product2 = '/images/products/2.png'
const product4 = '/images/products/4.png'
const product5 = '/images/products/5.png'
const product6 = '/images/products/6.png'

const user1 = '/images/users/user-1.jpg'
const user2 = '/images/users/user-2.jpg'
const user4 = '/images/users/user-4.jpg'
const user5 = '/images/users/user-5.jpg'
const user6 = '/images/users/user-6.jpg'

const master = '/images/cards/mastercard.svg'
const visa = '/images/cards/visa.svg'
const amex = '/images/cards/american-express.svg'

const locationPin = '/images/location-pin.png'

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

export type StatisticsWidgetType = {
  title: string
  badge: {
    text: string
    className: string
  }
  value: number
  prefix?: string
  suffix?: string
  description: string
  chartOptions?: () => EChartsOption
}

export const statisticData: StatisticsWidgetType[] = [
  {
    title: 'Total Sales',
    badge: { text: 'Monthly', className: 'bg-success/15 text-success' },
    value: 250,
    prefix: '$',
    suffix: 'K',
    description: 'Monthly Total Sales',
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
              color: index === 0 ? getColor('primary') : index === 1 ? getColor('secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
  {
    title: 'Total Orders',
    badge: { text: 'Monthly', className: 'bg-primary/15 text-primary' },
    value: 180,
    description: 'Monthly Total Orders',
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
              color: index === 0 ? getColor('primary') : index === 1 ? getColor('secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
  {
    title: 'New Customers',
    badge: { text: 'Monthly', className: 'bg-info/15 text-info' },
    value: 50895,
    description: 'Monthly New Customers',
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
              color: index === 0 ? getColor('primary') : index === 1 ? getColor('secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
  {
    title: 'Revenue',
    badge: { text: 'Monthly', className: 'bg-warning/15 text-warning' },
    value: 50.33,
    prefix: '$',
    suffix: 'K',
    description: 'Monthly Revenue',
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
              color: index === 0 ? getColor('primary') : index === 1 ? getColor('secondary') : '#bbcae14d',
            },
          })),
        },
      ],
    }),
  },
]

// order statistics

const category: string[] = []
const today = new Date()
const completedOrders: number[] = []
const processingOrders: number[] = []
const cancelledOrders: number[] = []

for (let i = -14; i <= 0; i++) {
  const currentDate = new Date()
  currentDate.setDate(today.getDate() + i)

  // Format: 03 May 25
  const formattedDate = currentDate.toLocaleDateString('en-GB', {
    day: '2-digit',
    month: 'short',
    year: '2-digit',
  })
  category.push(formattedDate)

  // Random order counts
  const completed = Math.floor(Math.random() * 200)
  const processing = Math.floor(Math.random() * 150)
  const cancelled = Math.floor(Math.random() * 50)

  completedOrders.push(completed)
  processingOrders.push(processing)
  cancelledOrders.push(cancelled)
}

export const orderStatisticsChartOptions = (): EChartsOption => ({
  tooltip: {
    trigger: 'axis',
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
    formatter: function (params: any) {
      const rawDate = new Date()
      rawDate.setDate(today.getDate() - 14 + params[0].dataIndex)

      const formattedDate = rawDate.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
      })

      const seriesInfo = params
        .map((item: any) => {
          return `${item.marker} ${item.seriesName}: <span class="fw-bold">${item.value}</span> Orders`
        })
        .join('<br/>')

      return `<div class="mb-1 text-body">${formattedDate}</div>${seriesInfo}`
    },
  },
  legend: {
    data: ['Completed', 'Processing', 'Cancelled'],
    top: 15,
    textStyle: {
      color: getColor('body-color'),
    },
  },

  xAxis: {
    data: category,
    axisLine: {
      lineStyle: {
        type: 'dashed',
        color: getColor('chart-border-color'),
      },
    },
    axisLabel: {
      show: true,
      color: getColor('body-color'),
    },
    splitLine: {
      lineStyle: {
        color: getColor('chart-border-color'),
        type: 'dashed',
      },
    },
  },
  yAxis: {
    axisLine: {
      lineStyle: {
        type: 'dashed',
        color: getColor('chart-border-color'),
      },
    },
    axisLabel: {
      show: true,
      color: getColor('body-color'),
    },
    splitLine: {
      show: false,
      lineStyle: {
        color: getColor('chart-border-color'),
        type: 'dashed',
      },
    },
  },
  grid: {
    left: 25,
    right: 25,
    bottom: 25,
    top: 60,
    containLabel: true,
  },
  series: [
    {
      name: 'Completed',
      type: 'line',
      smooth: true,
      itemStyle: {
        color: getColor('success'),
      },
      showAllSymbol: true,
      symbol: 'emptyCircle',
      symbolSize: 5,
      data: completedOrders,
    },
    {
      name: 'Processing',
      type: 'bar',
      barWidth: 14,
      itemStyle: {
        borderRadius: [5, 5, 0, 0],
        color: getColor('secondary'),
      },
      data: processingOrders,
    },
    {
      name: 'Cancelled',
      type: 'bar',
      barWidth: 14,
      itemStyle: {
        borderRadius: [5, 5, 0, 0],
        color: '#bbcae14d',
      },
      data: cancelledOrders,
    },
  ],
})

export type OrderStatisticType = {
  value: string | number
  prefix?: string
  suffix?: string
  change: number
  variant: 'success' | 'danger' | 'primary'
  title: string
}

export const orderStatisticData: OrderStatisticType[] = [
  {
    value: 24500,
    prefix: '$',
    change: 18.45,
    variant: 'success',
    title: 'Total sales in period',
  },
  {
    value: 1240,
    change: -10.35,
    variant: 'danger',
    title: 'Number of customers',
  },
  {
    value: 3750,
    change: 22.61,
    variant: 'primary',
    title: 'Products sold in the period',
  },
  {
    value: 65.49,
    prefix: '$',
    suffix: 'USD',
    change: 5.92,
    variant: 'success',
    title: 'Average order value',
  },
]

export type ProductType = {
  image: string
  name: string
  category: string
  stock: number
  price: number
  ratings: number
  reviews: number
  status: 'active' | 'low-stock' | 'out-of-stock'
  className: string
}

export const productData: ProductType[] = [
  {
    image: product1,
    name: 'Smart Watch',
    category: 'Wearables',
    stock: 120,
    price: 89.99,
    ratings: 4,
    reviews: 45,
    status: 'active',
    className: 'text-success',
  },
  {
    image: product2,
    name: 'Bluetooth Speaker',
    category: 'Audio',
    stock: 75,
    price: 39.5,
    ratings: 3,
    reviews: 20,
    status: 'low-stock',
    className: 'text-warning',
  },
  {
    image: product4,
    name: 'Gaming Mouse',
    category: 'Accessories',
    stock: 0,
    price: 24.99,
    ratings: 5,
    reviews: 14,
    status: 'out-of-stock',
    className: 'text-danger',
  },
  {
    image: product5,
    name: '4K Action Camera',
    category: 'Cameras',
    stock: 60,
    price: 149,
    ratings: 4,
    reviews: 31,
    status: 'active',
    className: 'text-success',
  },
  {
    image: product6,
    name: 'Fitness Tracker Band',
    category: 'Wearables',
    stock: 220,
    price: 34.95,
    ratings: 4.5,
    reviews: 18,
    status: 'active',
    className: 'text-success',
  },
]

export type OrderType = {
  id: string
  user: {
    image: string
    name: string
  }
  product: string
  date: string
  amount: number
  status: 'delivered' | 'pending' | 'completed' | 'cancelled'
  variant: string
}

export const orderData: OrderType[] = [
  {
    id: 'ORD-1001',
    user: {
      image: user1,
      name: 'John Doe',
    },
    product: 'Smart Watch',
    date: '2025-04-29',
    amount: 89.99,
    status: 'delivered',
    variant: 'success',
  },
  {
    id: 'ORD-1002',
    user: {
      image: user2,
      name: 'Emma Watson',
    },
    product: 'Bluetooth Speaker',
    date: '2025-04-28',
    amount: 39.5,
    status: 'pending',
    variant: 'warning',
  },
  {
    id: 'ORD-1003',
    user: {
      image: user4,
      name: 'Liam Johnson',
    },
    product: 'Smart Watch',
    date: '2025-04-27',
    amount: 89.99,
    status: 'completed',
    variant: 'success',
  },
  {
    id: 'ORD-1004',
    user: {
      image: user6,
      name: 'Olivia Brown',
    },
    product: 'Gaming Mouse',
    date: '2025-04-26',
    amount: 24.99,
    status: 'cancelled',
    variant: 'danger',
  },
  {
    id: 'ORD-1005',
    user: {
      image: user5,
      name: 'Noah Smith',
    },
    product: 'Fitness Tracker Band',
    date: '2025-04-25',
    amount: 34.95,
    status: 'completed',
    variant: 'success',
  },
]

export type TransactionType = {
  id: string
  order: string
  date: string
  time: string
  amount: number
  status: 'paid' | 'pending' | 'failed'
  className: string
  payment: {
    image: string
    lastDigit: string
  }
}

export const transactionData: TransactionType[] = [
  {
    id: '#TR-3468',
    order: '#ORD-1003 - Smart Watch',
    date: '27 Apr 2025',
    time: '02:15 PM',
    amount: 89.99,
    status: 'paid',
    className: 'bg-success/15 text-success',
    payment: {
      image: master,
      lastDigit: '1123',
    },
  },
  {
    id: '#TR-3469',
    order: '#ORD-1004 - Gaming Mouse',
    date: '26 Apr 2025',
    time: '09:42 AM',
    amount: 24.99,
    status: 'failed',
    className: 'bg-danger/15 text-danger',
    payment: {
      image: visa,
      lastDigit: '3490',
    },
  },
  {
    id: '#TR-3470',
    order: '#ORD-1005 - Fitness Tracker Band',
    date: '25 Apr 2025',
    time: '11:10 AM',
    amount: 34.95,
    status: 'paid',
    className: 'bg-success/15 text-success',
    payment: {
      image: amex,
      lastDigit: '8765',
    },
  },
  {
    id: '#TR-3471',
    order: '#ORD-1006 - Wireless Keyboard',
    date: '24 Apr 2025',
    time: '08:58 PM',
    amount: 59.0,
    status: 'pending',
    className: 'bg-warning/15 text-warning',
    payment: {
      image: master,
      lastDigit: '5566',
    },
  },
  {
    id: '#TR-3472',
    order: '#ORD-1007 - Portable Charger',
    date: '23 Apr 2025',
    time: '05:37 PM',
    amount: 45.8,
    status: 'paid',
    className: 'bg-success/15 text-success',
    payment: {
      image: visa,
      lastDigit: '9012',
    },
  },
]

export const worldTransactionMapOptions = {
  map: 'world',
  zoomOnScroll: true,
  zoomButtons: false,
  selectedMarkers: [1, 1],
  markersSelectable: true,
  selectedRegions: ['CA', 'US', 'AU'],
  regionStyle: {
    initial: {
      stroke: '#a2abbd',
      strokeWidth: 0.5,
      fillOpacity: 0.1,
    },
    selected: { fill: getColor('primary') },
  },
  markers: [
    {
      name: 'Russia',
      coords: [61.524, 105.3188],
    },
    {
      name: 'Canada',
      coords: [56.1304, -106.3468],
      style: {
        image: locationPin,
      },
    },
    { name: 'Australia', coords: [-25.2744, 133.7751] },
    { name: 'Greenland', coords: [71.7069, -42.6043] },
  ],
  lines: [
    {
      from: 'Russia',
      to: 'Canada',
    },
    {
      from: 'Australia',
      to: 'Canada',
    },
    {
      from: 'Greenland',
      to: 'Canada',
    },
    {
      from: 'Brazil',
      to: 'Canada',
    },
  ],
  markerStyle: {
    initial: {
      fill: getColor('primary'),
      stroke: getColor('primary'),
      fillOpacity: 0.3,
      strokeWidth: 2,
      r: 2,
    },
    selected: {
      fill: getColor('primary'),
      stroke: getColor('primary'),
      strokeWidth: 1,
    },
  },
  labels: {
    markers: {
      render: (marker: any) => marker.name,
    },
  },
  lineStyle: {
    animation: true,
    strokeDasharray: '6 3 6',
  },
}
