type ToggleDocumentAttributeType = (attribute: string, value: string, remove?: boolean, tag?: keyof HTMLElementTagNameMap) => void

export const toggleAttribute: ToggleDocumentAttributeType = (attribute, value, remove, tag = 'html'): void => {
  if (document.documentElement) {
    const element = document.getElementsByTagName(tag.toString())[0]
    const hasAttribute = element?.getAttribute(attribute)
    if (remove && hasAttribute) element?.removeAttribute(attribute)
    else element?.setAttribute(attribute, value)
  }
}

export const easeInOutQuad = (t: number, b: number, c: number, d: number) => {
  t /= d / 2
  if (t < 1) return (c / 2) * t * t + b
  t--
  return (-c / 2) * (t * (t - 2) - 1) + b
}

export const scrollToElement = (element: Element, to: number, duration: number) => {
  const start = element.scrollTop,
    change = to - start,
    increment = 20
  let currentTime = 0
  const animateScroll = function () {
    currentTime += increment
    element.scrollTop = easeInOutQuad(currentTime, start, change, duration)
    if (currentTime < duration) {
      setTimeout(animateScroll, increment)
    }
  }

  animateScroll()
}

export const toPascalCase = (value: string) =>
  value
    .replace(/[-_ ]+/g, ' ')
    .split(' ')
    .map((word) => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
    .join(' ')

export const toTitleCase = (value: string) =>
  value
    .replace(/[-_]+/g, ' ')
    .replace(/\s+/g, ' ')
    .trim()
    .split(' ')
    .map((word) => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
    .join(' ')

export const abbreviatedNumber = (val: number) => {
  const s = ['', 'k', 'm', 'b', 't']
  if (val === 0) return 0
  const sNum = Math.floor(Math.log10(val) / 3)
  let sVal = parseFloat((sNum != 0 ? val / Math.pow(1000, sNum) : val).toPrecision(2))
  if (sVal % 1 != 0) {
    sVal = Number.parseInt(sVal.toFixed(1))
  }
  return sVal + s[sNum]!
}

export function getColor(v: string, a: number = 1): string {
  if (typeof window === 'undefined') return 'rgba(0,0,0,0.2)'

  const val = getComputedStyle(document.documentElement).getPropertyValue(`--color-${v}`).trim()

  if (!val) return 'rgba(0,0,0,0.2)'

  if (a === 1) return val

  if (val.startsWith('#')) {
    const c = val.replace('#', '')
    const bigint = parseInt(c, 16)
    const r = (bigint >> 16) & 255
    const g = (bigint >> 8) & 255
    const b = bigint & 255
    return `rgba(${r}, ${g}, ${b}, ${a})`
  }

  if (val.startsWith('rgb')) {
    const rgb = val.match(/\d+,\s*\d+,\s*\d+/)?.[0]
    return rgb ? `rgba(${rgb}, ${a})` : val
  }

  return val
}

export function getDefaultFontFamily(): string {
  const body = document.body
  if (!body) return ''
  const font = getComputedStyle(body).fontFamily
  return font ?? ''
}

export const formatBytes = (bytes: number, decimals: number = 2) => {
  if (bytes === 0) return '0 Bytes'
  const k = 1024
  const dm = decimals < 0 ? 0 : decimals
  const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

  const i = Math.floor(Math.log(bytes) / Math.log(k))
  return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i]
}

export const generateInitials = (name = ''): string => {
  return name
    .split(' ')
    .map((word) => word[0])
    .join('')
    .toUpperCase()
}

export const splitArray = <T>(arr: T[], size: number): T[][] => {
  return Array.from({ length: Math.ceil(arr.length / size) }, (_, i) => arr.slice(i * size, i * size + size))
}

export const generateRandomEChartData = (dataName: string[]) => {
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
