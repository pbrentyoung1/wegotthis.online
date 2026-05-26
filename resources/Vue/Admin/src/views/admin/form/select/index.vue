<template>
  <PageBreadcrumb title="Select" subtitle="Forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.25">Choices.Js</h4>
          <p class="text-default-400">Choices.js is a lightweight, configurable select box/text input plugin. Similar to Select2 and Selectize but without the jQuery dependency.</p>
        </div>

        <div class="card-body">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Single Select Input: Default</h5>
              <p class="text-default-400">
                Set
                <code>data-choices</code>
                attribute to set a default single select.
              </p>
            </div>
            <div>
              <ChoicesSelect class="form-input" data-choices name="choices-single-default" id="choices-single-default">
                <option value="">This is a placeholder</option>
                <option value="Choice 1">Choice 1</option>
                <option value="Choice 2">Choice 2</option>
                <option value="Choice 3">Choice 3</option>
              </ChoicesSelect>
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Single Select Input: Option Groups</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-groups</code>
                attribute to set option group
              </p>
            </div>
            <div>
              <ChoicesSelect class="form-input" id="choices-single-groups" data-choices data-choices-groups data-placeholder="Select City" name="choices-single-groups">
                <option value="">Choose a city</option>
                <optgroup label="UK">
                  <option value="London">London</option>
                  <option value="Manchester">Manchester</option>
                  <option value="Liverpool">Liverpool</option>
                </optgroup>
                <optgroup label="FR">
                  <option value="Paris">Paris</option>
                  <option value="Lyon">Lyon</option>
                  <option value="Marseille">Marseille</option>
                </optgroup>
                <optgroup label="DE" disabled>
                  <option value="Hamburg">Hamburg</option>
                  <option value="Munich">Munich</option>
                  <option value="Berlin">Berlin</option>
                </optgroup>
                <optgroup label="US">
                  <option value="New York">New York</option>
                  <option value="Washington" disabled>Washington</option>
                  <option value="Michigan">Michigan</option>
                </optgroup>
                <optgroup label="SP">
                  <option value="Madrid">Madrid</option>
                  <option value="Barcelona">Barcelona</option>
                  <option value="Malaga">Malaga</option>
                </optgroup>
                <optgroup label="CA">
                  <option value="Montreal">Montreal</option>
                  <option value="Toronto">Toronto</option>
                  <option value="Vancouver">Vancouver</option>
                </optgroup>
              </ChoicesSelect>
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Single Select Input: No Search</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-search-false data-choices-removeItem</code>
              </p>
            </div>
            <div>
              <ChoicesSelect class="form-input" id="choices-single-no-search" name="choices-single-no-search" :choice-options="{ searchEnabled: false }">
                <option value="Zero">Zero</option>
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
                <option value="Five">Five</option>
                <option value="Six">Six</option>
              </ChoicesSelect>
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Single Select Input: No Sorting</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-sorting-false</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesSelect class="form-input" id="choices-single-no-sorting" name="choices-single-no-sorting" :choice-options="{ shouldSort: false, shouldSortItems: false }">
                <option value="Madrid">Madrid</option>
                <option value="Toronto">Toronto</option>
                <option value="Vancouver">Vancouver</option>
                <option value="London">London</option>
                <option value="Manchester">Manchester</option>
                <option value="Liverpool">Liverpool</option>
                <option value="Paris">Paris</option>
                <option value="Malaga">Malaga</option>
                <option value="Washington" disabled>Washington</option>
                <option value="Lyon">Lyon</option>
                <option value="Marseille">Marseille</option>
                <option value="Hamburg">Hamburg</option>
                <option value="Munich">Munich</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Berlin">Berlin</option>
                <option value="Montreal">Montreal</option>
                <option value="New York">New York</option>
                <option value="Michigan">Michigan</option>
              </ChoicesSelect>
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Multiple Select Input: Default</h5>
              <p class="text-default-400">
                Set
                <code>data-choices multiple</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesSelect :options="options4" id="choices-multiple" class="form-input" multiple />
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Multiple Select Input: With Remove Button</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-removeItem multiple</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesSelect :options="options4" :choice-options="{ removeItemButton: true }" id="choices-multiple-remove-button" class="form-input" multiple />
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Multiple Select Input: Option Groups</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-multiple-groups="true" multiple</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesSelect class="form-input" id="choices-multiple-groups" name="choices-multiple-groups" data-choices data-choices-multiple-groups="true" multiple>
                <option value="">Choose a city</option>
                <optgroup label="UK">
                  <option value="London">London</option>
                  <option value="Manchester">Manchester</option>
                  <option value="Liverpool">Liverpool</option>
                </optgroup>
                <optgroup label="FR">
                  <option value="Paris">Paris</option>
                  <option value="Lyon">Lyon</option>
                  <option value="Marseille">Marseille</option>
                </optgroup>
                <optgroup label="DE" disabled>
                  <option value="Hamburg">Hamburg</option>
                  <option value="Munich">Munich</option>
                  <option value="Berlin">Berlin</option>
                </optgroup>
                <optgroup label="US">
                  <option value="New York">New York</option>
                  <option value="Washington" disabled>Washington</option>
                  <option value="Michigan">Michigan</option>
                </optgroup>
                <optgroup label="SP">
                  <option value="Madrid">Madrid</option>
                  <option value="Barcelona">Barcelona</option>
                  <option value="Malaga">Malaga</option>
                </optgroup>
                <optgroup label="CA">
                  <option value="Montreal">Montreal</option>
                  <option value="Toronto">Toronto</option>
                  <option value="Vancouver">Vancouver</option>
                </optgroup>
              </ChoicesSelect>
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Text Input: Limit Values with Remove Button</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-limit="3" data-choices-removeItem</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesInput class="form-input" id="choices-text-remove-button" :choice-options="{ removeItemButton: true, maxItemCount: 3 }" type="text" value="Task-1" />
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Text Input: Unique Values Only</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-text-unique-true</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesInput class="form-input" id="choices-text-unique-values" :choice-options="{ duplicateItemsAllowed: false, paste: false }" value="Project-A, Project-B" />
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 text-sm">Text Input: Disabled</h5>
              <p class="text-default-400">
                Set
                <code>data-choices data-choices-text-disabled-true</code>
                attribute.
              </p>
            </div>
            <div>
              <ChoicesInput class="form-input" id="choices-text-disabled" :choice-options="{ itemDisabled: true }" type="text" value="josh@joshuajohnson.co.uk, joe@bloggs.co.uk" disabled />
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.25">Multi Select</h4>
          <p class="text-default-400 mb-4">Multi Select is an advanced replacement for standard select boxes. It supports searching, remote data sources, and infinite scrolling of results.</p>
        </div>

        <div class="card-body">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 block text-sm">Single Select Input with Button</h5>
              <p class="text-default-500">An example of a select dropdown with an appended button using Select2.</p>
            </div>
            <div>
              <div class="flex gap-2">
                <MultiSelect :model-value="selectedValue" :options="basicOptions" placeholder="Pick some" />
              </div>
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 block text-sm">Single Select Input with Groups</h5>
              <p class="text-default-500">Select2 can take a regular select box with optgroup support for better organization.</p>
            </div>
            <div>
              <MultiSelect :model-value="selectedGroupValue" :options="groupedOptions" :group-values="'options'" :group-label="'label'" />
            </div>
          </div>

          <hr class="border-default-300 my-7.5 border-t border-dashed" />

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
            <div>
              <h5 class="mb-2 block text-sm">Multiple Select Input</h5>
              <p class="text-default-500">multiple select with grouped options and placeholder.</p>
            </div>
            <div>
              <MultiSelect :model-value="selectedMutiGroupValue" :options="groupedOptions" :group-values="'options'" :group-label="'label'" :multiple="true" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import ChoicesInput from '~/components/ChoicesInput.vue'
import ChoicesSelect from '~/components/ChoicesSelect.vue'
import MultiSelect from '~/components/MultiSelect.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import { basicOptions, groupedOptions } from './components/data'

const selectedValue = ref<string | number | Array<string | number>>('Alaska')
const selectedGroupValue = ref<string | number | Array<string | number>>([])
const selectedMutiGroupValue = ref<string | number | Array<string | number>>([])

const options4 = [
  { value: 'choice-1', text: 'Choice 1' },
  { value: 'choice-2', text: 'Choice 2' },
  { value: 'choice-3', text: 'Choice 3' },
  { value: 'choice-4', text: 'Choice 4' },
]
</script>

<style></style>
