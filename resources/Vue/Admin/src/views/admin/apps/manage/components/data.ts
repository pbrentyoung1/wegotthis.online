import airbnbLogo from '/images/logos/airbnb.svg'
import amazonLogo from '/images/logos/amazon.svg'
import appleLogo from '/images/logos/apple.svg'
import asanaLogo from '/images/logos/asana.svg'
import dropboxLogo from '/images/logos/dropbox.svg'
import figmaLogo from '/images/logos/figma.svg'
import googleLogo from '/images/logos/google.svg'
import metaLogo from '/images/logos/meta.svg'
import microsoftLogo from '/images/logos/microsoft.svg'
import openaiLogo from '/images/logos/openai.svg'
import slackLogo from '/images/logos/slack.svg'
import spotifyLogo from '/images/logos/spotify.svg'

export type AppType = {
  id: number
  name: string
  description: string
  image: string
  plan: string
  status: string
  syncTime: string
  account: string
  lastSync: string
  usagePercent: number
  isActive: boolean
}

export const authorizedAppData: AppType[] = [
  {
    id: 1,
    name: 'Google Analytics',
    description: 'Google Analytics is a free web analytics service offered by Google that tracks and reports website traffic.',
    image: googleLogo,
    plan: 'Free Plan',
    status: 'Connected',
    syncTime: 'Every 15 mins',
    account: 'analytics@domain.com',
    lastSync: '12:56 pm, 12 May',
    usagePercent: 80,
    isActive: true,
  },
  {
    id: 2,
    name: 'Asana',
    description: 'Asana is a work management platform that helps teams organize, track, and manage their work more effectively.',
    image: asanaLogo,
    plan: 'Premium Plan',
    status: 'Connected',
    syncTime: 'Every 10 mins',
    account: 'project@asana.com',
    lastSync: '09:30 am, 18 May',
    usagePercent: 65,
    isActive: true,
  },
  {
    id: 3,
    name: 'Dropbox',
    description: 'Dropbox is a cloud storage platform for securely storing, sharing, and accessing files from anywhere.',
    image: dropboxLogo,
    plan: 'Business Plan',
    status: 'Connected',
    syncTime: 'Every 30 mins',
    account: 'files@dropbox.com',
    lastSync: '03:45 pm, 19 May',
    usagePercent: 92,
    isActive: true,
  },
]

export type IntegrationType = {
  name: string
  description: string
  website: string
  image: string
  isFree?: boolean
}

export const integrationData: IntegrationType[] = [
  {
    name: 'Amazon',
    description: 'Amazon Web Services offers scalable cloud computing and hosting solutions for businesses of all sizes...',
    website: 'www.amazon.com',
    image: amazonLogo,
    isFree: true,
  },
  {
    name: 'Figma',
    description: 'Figma is a collaborative interface design tool that helps teams design and prototype together in real time...',
    website: 'www.figma.com',
    image: figmaLogo,
  },
  {
    name: 'Microsoft',
    description: 'Microsoft provides productivity software and cloud services including Office 365, Azure, and more...',
    website: 'www.microsoft.com',
    image: microsoftLogo,
  },
  {
    name: 'OpenAI',
    description: 'OpenAI provides cutting-edge artificial intelligence APIs and tools to integrate AI into your apps...',
    website: 'www.openai.com',
    image: openaiLogo,
    isFree: true,
  },
  {
    name: 'Slack',
    description: 'Slack is a messaging app for teams that connects people, information, and tools together in one place...',
    website: 'www.slack.com',
    image: slackLogo,
  },
  {
    name: 'Spotify',
    description: 'Spotify is a digital music service that gives you access to millions of songs and podcasts...',
    website: 'www.spotify.com',
    image: spotifyLogo,
    isFree: true,
  },
  {
    name: 'Meta',
    description: 'Meta connects billions of people through its apps and services including Facebook, Instagram, and WhatsApp...',
    website: 'www.meta.com',
    image: metaLogo,
  },
  {
    name: 'Apple',
    description: 'Apple designs and develops consumer electronics, software, and online services including iPhone...',
    website: 'www.apple.com',
    image: appleLogo,
    isFree: true,
  },
  {
    name: 'Airbnb',
    description: 'Airbnb is an online marketplace for lodging, primarily homestays for vacation rentals, and tourism activities...',
    website: 'www.airbnb.com',
    image: airbnbLogo,
  },
]
