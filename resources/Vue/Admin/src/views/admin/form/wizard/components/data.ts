import type { Component } from 'vue'
import Step1 from './Step1.vue'
import Step2 from './Step2.vue'
import Step3 from './Step3.vue'
import Step4 from './Step4.vue'
import Step5 from './Step5.vue'

export type WizardStepType = {
  id: string
  icon: string
  title: string
  subtitle: string
  content: Component
}

export const wizardSteps: WizardStepType[] = [
  {
    id: 'stuInfo',
    icon: 'user-circle',
    title: 'Student Info',
    subtitle: 'Personal details',
    content: Step1,
  },
  {
    id: 'addrInfo',
    icon: 'map-pin',
    title: 'Address Info',
    subtitle: 'Where you live',
    content: Step2,
  },
  {
    id: 'courseInfo',
    icon: 'book',
    title: 'Course Info',
    subtitle: 'Select your course',
    content: Step3,
  },
  {
    id: 'parentInfo',
    icon: 'users',
    title: 'Parent Info',
    subtitle: 'Guardian details',
    content: Step4,
  },
  {
    id: 'documents',
    icon: 'folder-open',
    title: 'Documents',
    subtitle: 'Upload certificates',
    content: Step5,
  },
]
