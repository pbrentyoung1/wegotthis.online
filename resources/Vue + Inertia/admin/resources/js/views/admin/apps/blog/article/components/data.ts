export type PostType = {
  title: string
  href: string
}

export const popularPostData: PostType[] = [
  { title: 'Unlocking the Secrets of Modern UI Design', href: '' },
  { title: 'How to Build a Portfolio with Tailwind CSS', href: '' },
  { title: 'Boost Productivity with These Web Dev Tools', href: '' },
  { title: 'The Future of Frontend: Trends to Watch in 2025', href: '' },
  { title: 'Essential Tips for Clean and Maintainable Code', href: '' },
]

export type TagType = {
  name: string
  href: string
}

export const tagData: TagType[] = [
  { name: 'Web Design', href: '' },
  { name: 'Frontend', href: '' },
  { name: 'Tailwind CSS', href: '' },
  { name: 'JavaScript', href: '' },
  { name: 'React', href: '' },
  { name: 'Startup', href: '' },
  { name: 'DevTools', href: '' },
  { name: 'Open Source', href: '' },
  { name: 'Performance', href: '' },
  { name: 'UX/UI', href: '' },
  { name: 'SEO', href: '' },
]

export const socialLinks = [
  {
    title: 'Facebook',
    colorClass: 'btn-primary',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"/>
    </svg>`,
  },
  {
    title: 'Twitter-x',
    colorClass: 'btn-info',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M4 4l11.733 16h4.267l-11.733 -16z"/>
      <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"/>
    </svg>`,
  },
  {
    title: 'Instagram',
    colorClass: 'btn-danger',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"/>
      <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
      <path d="M16.5 7.5v.01"/>
    </svg>`,
  },
  {
    title: 'Dribbble',
    colorClass: 'btn-success',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-brand-dribbble">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
      <path d="M9 3.6c5 6 7 10.5 7.5 16.2"/>
      <path d="M6.4 19c3.5 -3.5 6 -6.5 14.5 -6.4"/>
      <path d="M3.1 10.75c5 0 9.814 -.38 15.314 -5"/>
    </svg>`,
  },
  {
    title: 'LinkedIn',
    colorClass: 'btn-secondary',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M8 11v5"/>
      <path d="M8 8v.01"/>
      <path d="M12 16v-5"/>
      <path d="M16 16v-3a2 2 0 1 0 -4 0"/>
      <path d="M3 7a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"/>
    </svg>`,
  },
  {
    title: 'YouTube',
    colorClass: 'btn-danger',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z"/>
      <path d="M10 9l5 3l-5 3z"/>
    </svg>`,
  },
]
