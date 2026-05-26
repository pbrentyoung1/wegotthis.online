import type { Component } from 'vue'
import AddressInfo from './AddressInfo.vue'
import BillingInfo from './BillingInfo.vue'
import InvoiceInfo from './InvoiceInfo.vue'
import PaymentInfo from './PaymentInfo.vue'

export type checkoutStepType = {
  icon: string
  title: string
  content: Component
}

export const checkoutStepData: checkoutStepType[] = [
  {
    icon: 'user-circle',
    title: 'Billing Info',
    content: BillingInfo,
  },
  {
    icon: 'truck',
    title: 'Shipping Info',
    content: AddressInfo,
  },
  {
    icon: 'credit-card',
    title: 'Payment Info',
    content: PaymentInfo,
  },
  {
    icon: 'checks',
    title: 'Finish',
    content: InvoiceInfo,
  },
]
