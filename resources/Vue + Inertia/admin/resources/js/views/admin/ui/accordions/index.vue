<template>
  <PageBreadcrumb title="Accordions" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol xl="12">
        <BCard no-body>
          <BCardHeader>
            <h4 class="card-title">Examples</h4>
          </BCardHeader>

          <BCardBody>
            <p class="text-muted mb-2">Build vertically collapsing accordions in combination with our Collapse JavaScript plugin.</p>

            <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/accordion.html" target="_blank">
              Accordions on Bootstrap
              <Icon icon="chevron-right" class="ms-1" />
            </Link>
          </BCardBody>
        </BCard>
      </BCol>

      <BCol xl="12">
        <CardWithAction title="Default Accordions" isCollapsable>
          <BAccordion>
            <BAccordionItem v-for="(item, idx) in accordionData" :key="idx" :title="item.question + '#' + (idx + 1)" :visible="idx == 0">
              <div v-html="item.answer"></div>
            </BAccordionItem>
          </BAccordion>
        </CardWithAction>
      </BCol>

      <BCol xl="12">
        <CardWithAction title="Flush Accordions" isCollapsable>
          <BAccordion flush>
            <BAccordionItem v-for="(item, idx) in accordionData" :key="idx" :title="item.question + '#' + (idx + 1)" :visible="idx == 0">
              <div v-html="item.answer"></div>
            </BAccordionItem>
          </BAccordion>
        </CardWithAction>
      </BCol>

      <BCol xl="12">
        <CardWithAction title="Always Open Accordions" isCollapsable>
          <BAccordion free>
            <BAccordionItem v-for="(item, idx) in accordionData" :key="idx" :title="item.question + '#' + (idx + 1)" :visible="idx == 0">
              <div v-html="item.answer"></div>
            </BAccordionItem>
          </BAccordion>
        </CardWithAction>
      </BCol>

      <BCol xl="12">
        <CardWithAction title="Accordion Without Arrow" isCollapsable>
          <BAccordion class="accordion-arrow-none">
            <BAccordionItem v-for="(item, idx) in accordionData" :key="idx" :title="item.question + '#' + (idx + 1)" :visible="idx == 0">
              <div v-html="item.answer"></div>
            </BAccordionItem>
          </BAccordion>
        </CardWithAction>
      </BCol>

      <BCol xl="12">
        <CardWithAction title="Bordered Accordions" isCollapsable>
          <BAccordion class="accordion-bordered">
            <BAccordionItem v-for="(item, idx) in accordionData" :key="idx" :title="item.question + '#' + (idx + 1)" :visible="idx == 0">
              <div v-html="item.answer"></div>
            </BAccordionItem>
          </BAccordion>
        </CardWithAction>
      </BCol>

      <BCol xl="12">
        <CardWithAction title="Custom Icon Accordion" isCollapsable>
          <BAccordion v-model="activeItem" class="accordion-custom-icon accordion-arrow-none">
            <BAccordionItem id="0">
              <template #title>
                Accordion item with custom icons
                <Icon icon="plus" class="accordion-icon accordion-icon-on" />
                <Icon icon="minus" class="accordion-icon accordion-icon-off" />
              </template>

              <div>
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS
                transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </BAccordionItem>

            <BAccordionItem id="1">
              <template #title>
                Accordion item with custom icons
                <Icon icon="plus" class="accordion-icon accordion-icon-on" />
                <Icon icon="minus" class="accordion-icon accordion-icon-off" />
              </template>

              <div>
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS
                transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </BAccordionItem>

            <BAccordionItem id="2">
              <template #title>
                Accordion item with custom icons
                <Icon icon="plus" class="accordion-icon accordion-icon-on" />
                <Icon icon="minus" class="accordion-icon accordion-icon-off" />
              </template>

              <div>
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS
                transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </BAccordionItem>
          </BAccordion>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BAccordion, BAccordionItem, BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'

const activeItem = ref('0')

interface AccordionType {
  question: string
  answer: string
}

const accordionData: AccordionType[] = [
  {
    question: 'Accordion Item ',
    answer:
      "<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
  },
  {
    question: 'Accordion Item ',
    answer:
      "<strong>This is the second item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
  },
  {
    question: 'Accordion Item ',
    answer:
      "<strong>This is the third item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.",
  },
]
</script>

<style scoped></style>
