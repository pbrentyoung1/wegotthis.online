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

type SettingStepType = { icon: string; title: string; subtitle: string; component: Component }

export const settingStepsData: SettingStepType[] = [
  { icon: 'building-store', title: 'General Info', subtitle: 'Shop basics', component: GeneralInfo },
  { icon: 'building', title: 'Store Details', subtitle: 'Business info', component: StoreDetails },
  { icon: 'palette', title: 'Branding', subtitle: 'Logo & colors', component: Branding },
  { icon: 'pig-money', title: 'Currency & Tax', subtitle: 'Regional setup', component: CurrencyAndTax },
  { icon: 'truck', title: 'Shipping', subtitle: 'Delivery setup', component: Shipping },
  { icon: 'credit-card', title: 'Payments', subtitle: 'Gateways & modes', component: Payments },
  { icon: 'bell', title: 'Notifications', subtitle: 'Emails & alerts', component: Notifications },
  { icon: 'file-text', title: 'Invoices & Receipts', subtitle: 'Billing templates', component: Invoices },
  { icon: 'world', title: 'SEO & Legal', subtitle: 'Policies & SEO', component: SeoAndLegal },
  { icon: 'plug', title: 'Integrations', subtitle: '3rd-party apps', component: Integrations },
  { icon: 'database', title: 'Backup & Restore', subtitle: 'Data recovery', component: BackupAndRestore },
  { icon: 'settings', title: 'Advanced', subtitle: 'System controls', component: Advanced },
]
