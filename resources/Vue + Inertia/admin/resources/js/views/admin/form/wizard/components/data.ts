export type StepType = {
  title: string
  subtitle: string
  icon: string
}

export const stepData: StepType[] = [
  {
    title: 'Student Info',
    subtitle: 'Personal details',
    icon: 'user-circle',
  },
  {
    title: 'Address Info',
    subtitle: 'Where you live',
    icon: 'map-pin',
  },
  {
    title: 'Course Info',
    subtitle: 'Select your course',
    icon: 'book',
  },
  {
    title: 'Parent Info',
    subtitle: 'Guardian details',
    icon: 'users',
  },
  {
    title: 'Documents',
    subtitle: 'Upload certificates',
    icon: 'folder-open',
  },
]
