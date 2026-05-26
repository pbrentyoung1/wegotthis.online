<template>
  <div class="card">
    <div class="card-header block">
      <h4 class="card-title mb-1.25">Form Inputmask</h4>
      <p class="text-default-400">Inputmask is a javascript library that creates an input mask. Inputmask can run against vanilla javascript, jQuery, and jqlite. (Hoverable Inputmask)</p>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Date</h5>
        </div>
        <MaskInput v-model="date" mask="##/##/####" class="form-input" placeholder="dd/mm/yyyy" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Hour</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="00:00:00"</code>
          </p>
        </div>
        <MaskInput v-model="hour" mask="##:##:##" class="form-input" placeholder="hh:mm:ss" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Date & Hour</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="00/00/0000 00:00:00"</code>
          </p>
        </div>
        <MaskInput v-model="dateHour" mask="##/##/#### ##:##:##" class="form-input" placeholder="dd/mm/yyyy hh:mm:ss" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">ZIP Code</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="00000-000"</code>
          </p>
        </div>
        <MaskInput v-model="zip" mask="#####-###" class="form-input" placeholder="12345-678" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Crazy ZIP Code</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="0-00-00-00"</code>
          </p>
        </div>
        <MaskInput v-model="crazyZip" mask="#-##-##-##" class="form-input" placeholder="1-23-45-67" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Money</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="000.000.000.000.000,00"</code>,
          </p>
        </div>
        <MaskInput v-model="money" mask="###.###.###.###.###,##" class="form-input" placeholder="1-23-45-67" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Money 2</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="#.##0,00"</code>,
          </p>
        </div>
        <MaskInput v-model="money2" mask="#.###.##" class="form-input" placeholder="1-23-45-67" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Telephone</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="0000-0000"</code>
          </p>
        </div>
        <MaskInput v-model="phone" mask="####-####" class="form-input" placeholder="1234-5678" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">Telephone with Area Code</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="(00) 0000-0000"</code>
          </p>
        </div>
        <MaskInput v-model="phoneWithArea" mask="(##) ####-####" class="form-input" placeholder="(12) 3456-7890" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">US Telephone</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="(000) 000-0000"</code>
          </p>
        </div>
        <MaskInput v-model="usPhone" mask="(###) ###-####" class="form-input" placeholder="(123) 456-7890" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">São Paulo Cellphones</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="(00) 00000-0000"</code>
          </p>
        </div>
        <MaskInput v-model="spCell" mask="(##) #####-####" class="form-input" placeholder="(12) 91234-5678" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">CPF</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="000.000.000-00"</code>,
          </p>
        </div>
        <MaskInput v-model="cpf" mask="###.###.###-##" class="form-input" placeholder="123.456.789-00" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">CNPJ</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="00.000.000/0000-00"</code>,
          </p>
        </div>
        <MaskInput v-model="cnpj" mask="##.###.###/####-##" class="form-input" placeholder="12.345.678/0001-99" />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <div>
          <h5 class="mb-2">IP Address</h5>
          <p class="text-default-400">
            Add attribute
            <code>mask="099.099.099.099"</code>,
          </p>
        </div>
        <MaskInput v-model="ip" mask="###.###.###.###" class="form-input" placeholder="192.168.000.001" />
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { MaskInput } from 'vue-mask-next'
const date = ref('')
const hour = ref('')
const dateHour = ref('')
const zip = ref('')
const crazyZip = ref('')
const phone = ref('')
const phoneWithArea = ref('')
const usPhone = ref('')
const spCell = ref('')
const cpf = ref('')
const cnpj = ref('')
const ip = ref('')
const money = ref('')
const money2 = ref('')
</script>
