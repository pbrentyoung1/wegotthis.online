import type { Component } from 'vue'
import Advanced from './Advanced.vue'
import BackupAndRestore from './BackupAndRestore.vue'
import Branding from './Branding.vue'
import CurrencyAndTax from './CurrencyAndTax.vue'
import GeneralInfo from './GeneralInfo.vue'
import Integrations from './Integrations.vue'
import Invoices from './Invoices.vue'
import Notifications from './Notifications.vue'
import Payments from './Payments.vue'
import SeoAndLegal from './SeoAndLegal.vue'
import Shipping from './Shipping.vue'
import StoreDetails from './StoreDetails.vue'

type SettingStepType = { icon: string; title: string; subtitle: string; content: Component }

export const settingStepsData: SettingStepType[] = [
  { icon: 'building-store', title: 'General Info', subtitle: 'Shop basics', content: GeneralInfo },
  { icon: 'building', title: 'Store Details', subtitle: 'Business info', content: StoreDetails },
  { icon: 'palette', title: 'Branding', subtitle: 'Logo & colors', content: Branding },
  { icon: 'pig-money', title: 'Currency & Tax', subtitle: 'Regional setup', content: CurrencyAndTax },
  { icon: 'truck', title: 'Shipping', subtitle: 'Delivery setup', content: Shipping },
  { icon: 'credit-card', title: 'Payments', subtitle: 'Gateways & modes', content: Payments },
  { icon: 'bell', title: 'Notifications', subtitle: 'Emails & alerts', content: Notifications },
  { icon: 'file-text', title: 'Invoices & Receipts', subtitle: 'Billing templates', content: Invoices },
  { icon: 'world', title: 'SEO & Legal', subtitle: 'Policies & SEO', content: SeoAndLegal },
  { icon: 'plug', title: 'Integrations', subtitle: '3rd-party apps', content: Integrations },
  { icon: 'database', title: 'Backup & Restore', subtitle: 'Data recovery', content: BackupAndRestore },
  { icon: 'settings', title: 'Advanced', subtitle: 'System controls', content: Advanced },
]
