<template>
  <h5 class="my-1 fs-md">Billing Information</h5>
  <p class="text-muted fs-sm mb-4">Fill the form below in order to send you the order's invoice.</p>
  <BForm>
    <BRow>
      <BCol md="6">
        <BFormGroup label="First Name" label-for="billing-first-name" class="mb-3">
          <BFormInput id="billing-first-name" type="text" placeholder="Enter your first name" />
        </BFormGroup>
      </BCol>
      <BCol md="6">
        <BFormGroup label="Last Name" label-for="billing-last-name" class="mb-3">
          <BFormInput id="billing-last-name" type="text" placeholder="Enter your last name" />
        </BFormGroup>
      </BCol>
    </BRow>
    <BRow>
      <BCol md="6">
        <BFormGroup label="Email *" label-for="billing-email-address" class="mb-3">
          <BFormInput id="billing-email-address" type="email" placeholder="Enter your email" />
        </BFormGroup>
      </BCol>
      <BCol md="6">
        <BFormGroup label="Phone *" label-for="billing-phone" class="mb-3">
          <MaskInput v-model="phoneWithArea" mask="(##) ###-####-###" class="form-control" placeholder="(xx) xxx xxxx xxx" />
        </BFormGroup>
      </BCol>
    </BRow>
    <BRow>
      <BCol cols="12">
        <BFormGroup label="Address *" label-for="billing-address" class="mb-3">
          <BFormTextarea id="billing-address" rows="2" placeholder="Enter your address" />
        </BFormGroup>
      </BCol>
    </BRow>
    <BRow>
      <BCol md="4">
        <BFormGroup label="Town / City" label-for="billing-town-city" class="mb-3">
          <BFormInput id="billing-town-city" type="text" placeholder="Enter your city name" />
        </BFormGroup>
      </BCol>
      <BCol md="4">
        <BFormGroup label="State" label-for="billing-state" class="mb-3">
          <BFormInput id="billing-state" type="text" placeholder="Enter your state" />
        </BFormGroup>
      </BCol>
      <BCol md="4">
        <BFormGroup label="Zip / Postal Code" label-for="billing-zip-postal" class="mb-3">
          <MaskInput v-model="zip" mask="#####-###" class="form-control" placeholder="Enter your zip code" />
        </BFormGroup>
      </BCol>
    </BRow>
    <BRow>
      <BCol cols="12">
        <BFormGroup label="Country" class="mb-3">
          <BFormSelect v-model="country" class="form-select">
            <option value="All">Select Country</option>
            <option value="AF">Afghanistan</option>
            <option value="AL">Albania</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Cote d'Ivoire</option>
            <option value="HR">Croatia (Hrvatska)</option>
            <option value="CU">Cuba</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GA">Gabon</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="HT">Haiti</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
          </BFormSelect>
        </BFormGroup>
      </BCol>
    </BRow>
    <BRow>
      <BCol cols="12">
        <div class="mb-3">
          <BFormCheckbox id="customCheck2" value=""> Ship to different address ? </BFormCheckbox>
        </div>
        <BFormGroup label="Order Notes:" label-for="example-textarea" class="mb-3 mt-3">
          <BFormTextarea id="example-textarea" rows="3" placeholder="Write some note.." />
        </BFormGroup>
      </BCol>
    </BRow>
  </BForm>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import { MaskInput } from 'vue-mask-next'
const phoneWithArea = ref('')
const zip = ref('')
const country = ref('All')
</script>

<style scoped></style>
