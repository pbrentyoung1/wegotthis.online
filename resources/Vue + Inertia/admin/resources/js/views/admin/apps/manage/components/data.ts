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
  name: string
  description: string
  image: string
  plan: 'Free' | 'Premium'
  lastSync: string
  isActive: boolean
}

export const authorizedAppData: AppType[] = [
  {
    name: 'Google Analytics',
    description: 'Google Analytics is a free web analytics service offered by Google that tracks and reports website traffic.',
    image: googleLogo,
    plan: 'Free',
    isActive: true,
    lastSync: '12:56pm, 12 May',
  },
  {
    name: 'Asana',
    description: 'Asana is a web and mobile app designed to help teams organize, track, and manage their work and tasks.',
    image: asanaLogo,
    plan: 'Premium',
    isActive: true,
    lastSync: '09:32am, 18 Aug',
  },
  {
    name: 'Dropbox',
    description: 'Dropbox is a cloud-based file storage and collaboration platform designed to facilitate easy file sharing.',
    image: dropboxLogo,
    plan: 'Premium',
    isActive: true,
    lastSync: '11:23pm, 08 Dec',
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
