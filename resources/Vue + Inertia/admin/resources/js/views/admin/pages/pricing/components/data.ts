export type PricingPlanType = {
  name: string
  description: string
  price: number
  paymentType: string
  text: string
  features: {
    icon: string
    name: string
    className: string
  }[]
  buttonText: string
  isPopular?: boolean
}

export const pricingPlans: PricingPlanType[] = [
  {
    name: 'Free Plan',
    description: 'Great for solo developers trying things out',
    price: 0,
    paymentType: 'No credit card required',
    text: 'Free forever',
    features: [
      { icon: 'check', name: '1 user license', className: 'text-success' },
      { icon: 'check', name: 'Access to basic components', className: 'text-success' },
      { icon: 'check', name: 'Community support only', className: 'text-success' },
      { icon: 'check', name: 'Limited documentation', className: 'text-success' },
      { icon: 'x', name: 'No commercial use', className: 'text-danger' },
      { icon: 'x', name: 'No Figma/design files', className: 'text-danger' },
    ],
    buttonText: 'Start Free',
  },
  {
    name: 'Pro Plan',
    description: 'Ideal for freelancers and small teams with commercial needs',
    price: 129,
    paymentType: 'One-time payment',
    text: 'Plus applicable taxes',
    features: [
      { icon: 'check', name: '3 user licenses', className: 'text-success' },
      { icon: 'check', name: 'Full component access', className: 'text-success' },
      { icon: 'check', name: 'Commercial project rights', className: 'text-success' },
      { icon: 'check', name: 'Email support', className: 'text-success' },
      { icon: 'check', name: 'Lifetime updates', className: 'text-success' },
      { icon: 'check', name: 'Figma design files', className: 'text-success' },
    ],
    buttonText: 'Upgrade Now',
    isPopular: true,
  },
  {
    name: 'Enterprise Plan',
    description: 'Best for companies with scaling teams and critical projects',
    price: 499,
    paymentType: 'One-time payment',
    text: 'Includes extended support',
    features: [
      { icon: 'check', name: 'Unlimited users', className: 'text-success' },
      { icon: 'check', name: 'All premium components & layouts', className: 'text-success' },
      { icon: 'check', name: 'Commercial & SaaS usage rights', className: 'text-success' },
      { icon: 'check', name: 'Dedicated support & onboarding', className: 'text-success' },
      { icon: 'check', name: 'Custom Figma UI kits', className: 'text-success' },
      { icon: 'check', name: 'Priority feature requests', className: 'text-success' },
    ],
    buttonText: 'Contact Sales',
  },
]
