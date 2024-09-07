{{-- modal new budget --}}
<div id="ember150" class="modal-fresh mod-skinny modal-budget-settings ">
  <div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 263.5px;">
    <div class="modal-fresh-header">
      <div class="modal-fresh-title">
        <div class="ynab4-migration">
          New Budget
          <button class="button" type="button">
            Migrate a YNAB 4 Budget
            <svg class="ynab-new-icon " width="8" height="8">
              <!---->
              <use href="#icon_sprite_chevron_right"></use>
            </svg>
          </button>
        </div>
      </div>
      <!---->
    </div>
    <div class="modal-fresh-body">
      <section>
        <form>
          <label for="budget-name" class="type-body-bold">Budget Name</label>
          <div class="field-with-error">
            <div>
              <input id="modal-settings-budget-name" class="ember-text-field ember-view modal-budget-settings-name" type="text">
            </div>
            <!---->
            <!---->
          </div>
          <div class="modal-budget-settings-currency-fields">
            <div>
              <label for="modal-settings-currency" class="type-body-bold">Currency</label>
              <div class="x-select-container">
                <select class="js-x-select" id="modal-settings-currency">
                  <!----><!---->
                  <optgroup label="Common Currencies">
                    <option value="USD">US Dollar–USD</option>
                    <option value="GBP">UK Pound Sterling–GBP</option>
                    <option value="CAD">Canadian Dollar–CAD</option>
                    <option value="AUD">Australian Dollar–AUD</option>
                    <option value="EUR">Euro–EUR</option>
                  </optgroup>
                  <optgroup label="All Currencies">
                    <option value="ALL">Albanian Lek–ALL</option>
                    <option value="DZD">Algerian Dinar–DZD</option>
                    <option value="AOA">Angolan Kwanza–AOA</option>
                    <option value="ARS">Argentine Peso–ARS</option>
                    <option value="AMD">Armenian Dram–AMD</option>
                    <option value="AWG">Aruban Florin–AWG</option>
                    <option value="AUD">Australian Dollar–AUD</option>
                    <option value="AZN">Azerbaijanian Manat–AZN</option>
                    <option value="BSD">Bahamian Dollar–BSD</option>
                    <option value="BHD">Bahraini Dinar–BHD</option>
                    <option value="BDT">Bangladeshi Taka–BDT</option>
                    <option value="BBD">Barbadian Dollar–BBD</option>
                    <option value="BYN">Belarusian Ruble–BYN</option>
                    <option value="BZD">Belize Dollar–BZD</option>
                    <option value="BOB">Boliviano–BOB</option>
                    <option value="BWP">Botswana Pula–BWP</option>
                    <option value="BRL">Brazilian Real–BRL</option>
                    <option value="BND">Brunei Dollar–BND</option>
                    <option value="BGN">Bulgarian Lev–BGN</option>
                    <option value="KHR">Cambodian Riel–KHR</option>
                    <option value="CAD">Canadian Dollar–CAD</option>
                    <option value="CVE">Cape Verdean Escudo–CVE</option>
                    <option value="KYD">Cayman Islands Dollar–KYD</option>
                    <option value="XAF">Central African CFA franc–XAF</option>
                    <option value="XPF">CFP franc–XPF</option>
                    <option value="CLP">Chilean Peso–CLP</option>
                    <option value="CNY">Chinese Renminbi (Yuan)–CNY</option>
                    <option value="COP">Colombian Peso–COP</option>
                    <option value="BAM">Convertible Marks–BAM</option>
                    <option value="CRC">Costa Rican Colon–CRC</option>
                    <option value="HRK">Croatian Kuna–HRK</option>
                    <option value="CZK">Czech Koruna–CZK</option>
                    <option value="DKK">Danish Krone–DKK</option>
                    <option value="DJF">Djiboutian Franc–DJF</option>
                    <option value="DOP">Dominican Peso–DOP</option>
                    <option value="XCD">Eastern Caribbean Dollar–XCD</option>
                    <option value="EGP">Egyptian Pound–EGP</option>
                    <option value="EEK">Estonian Kroon–EEK</option>
                    <option value="ETB">Ethiopian Birr–ETB</option>
                    <option value="EUR">Euro–EUR</option>
                    <option value="FJD">Fijian Dollar–FJD</option>
                    <option value="GMD">Gambian Dalasi–GMD</option>
                    <option value="GEL">Georgian Lari–GEL</option>
                    <option value="GHS">Ghanaian Cedi–GHS</option>
                    <option value="GTQ">Guatemalan Quetzal–GTQ</option>
                    <option value="HTG">Haitian Gourde–HTG</option>
                    <option value="HNL">Honduran Lempira–HNL</option>
                    <option value="HKD">Hong Kong Dollar–HKD</option>
                    <option value="HUF">Hungarian Forint–HUF</option>
                    <option value="ISK">Icelandic Krona–ISK</option>
                    <option value="INR">Indian Rupee–INR</option>
                    <option value="IDR">Indonesian Rupiah–IDR</option>
                    <option value="IRR">Iranian Rial–IRR</option>
                    <option value="IQD">Iraqi Dinar–IQD</option>
                    <option value="ILS">Israeli New Shekel–ILS</option>
                    <option value="JMD">Jamaican Dollar–JMD</option>
                    <option value="JPY">Japanese Yen–JPY</option>
                    <option value="JOD">Jordanian Dinar–JOD</option>
                    <option value="KZT">Kazakhstani Tenge–KZT</option>
                    <option value="KES">Kenyan Shilling–KES</option>
                    <option value="KRW">Korean Won–KRW</option>
                    <option value="KWD">Kuwaiti Dinar–KWD</option>
                    <option value="MMR">Kyat–MMR</option>
                    <option value="KGS">Kyrgyzstani Som–KGS</option>
                    <option value="LAK">Lao Kip–LAK</option>
                    <option value="LBP">Lebanese Pound–LBP</option>
                    <option value="LRD">Liberian Dollar–LRD</option>
                    <option value="LYD">Libyan Dinar–LYD</option>
                    <option value="MOP">Macao Pataca–MOP</option>
                    <option value="MKD">Macedonian Denar–MKD</option>
                    <option value="MGA">Malagasy Ariary–MGA</option>
                    <option value="MWK">Malawi Kwacha–MWK</option>
                    <option value="MYR">Malaysian Ringgit–MYR</option>
                    <option value="MVR">Maldivian Rufiyaa–MVR</option>
                    <option value="MTL">Maltese Lira–MTL</option>
                    <option value="MUR">Mauritian Rupee–MUR</option>
                    <option value="MXN">Mexican Peso–MXN</option>
                    <option value="MDL">Moldovan Leu–MDL</option>
                    <option value="MNT">Mongolian Tugrik–MNT</option>
                    <option value="MAD">Moroccan Dirham–MAD</option>
                    <option value="MZN">Mozambican Metical–MZN</option>
                    <option value="NPR">Nepalese Rupee–NPR</option>
                    <option value="ANG">Netherlands Antillean Gulden–ANG</option>
                    <option value="TWD">New Taiwan Dollar–TWD</option>
                    <option value="NZD">New Zealand Dollar–NZD</option>
                    <option value="NIO">Nicaraguan Cordoba Oro–NIO</option>
                    <option value="NGN">Nigerian Naira–NGN</option>
                    <option value="NOK">Norwegian Krone–NOK</option>
                    <option value="OMR">Omani Rial–OMR</option>
                    <option value="PKR">Pakistan Rupee–PKR</option>
                    <option value="PAB">Panamanian Balboa–PAB</option>
                    <option value="PGK">Papua New Guinean Kina–PGK</option>
                    <option value="PYG">Paraguay Guarani–PYG</option>
                    <option value="PEN">Peruvian Nuevo Sol–PEN</option>
                    <option value="PHP">Philippine Peso–PHP</option>
                    <option value="PLN">Polish Zloty–PLN</option>
                    <option value="QAR">Qatari Rial–QAR</option>
                    <option value="RON">Romanian Leu–RON</option>
                    <option value="RUB">Russian Ruble–RUB</option>
                    <option value="RUR">Russian Ruble–RUR</option>
                    <option value="RWF">Rwandan Franc–RWF</option>
                    <option value="SAR">Saudi Riyal–SAR</option>
                    <option value="RSD">Serbian Dinar–RSD</option>
                    <option value="SLL">Sierra Leonean Leone–SLL</option>
                    <option value="SGD">Singapore Dollar–SGD</option>
                    <option value="SKK">Slovak Koruna–SKK</option>
                    <option value="SIT">Slovenian Tolar–SIT</option>
                    <option value="ZAR">South African Rand–ZAR</option>
                    <option value="LKR">Sri Lankan Rupee–LKR</option>
                    <option value="SDG">Sudanese Pound–SDG</option>
                    <option value="SEK">Swedish Krona–SEK</option>
                    <option value="CHF">Swiss Franc–CHF</option>
                    <option value="SYP">Syrian Pound–SYP</option>
                    <option value="TZS">Tanzanian Shilling–TZS</option>
                    <option value="THB">Thai Baht–THB</option>
                    <option value="TOP">Tongan Dollar–TOP</option>
                    <option value="TTD">Trinidad Dollar–TTD</option>
                    <option value="TND">Tunisian Dinar–TND</option>
                    <option value="TRY">Turkish Lira–TRY</option>
                    <option value="AED">UAE Dirham–AED</option>
                    <option value="UGX">Ugandan Shilling–UGX</option>
                    <option value="GBP">UK Pound Sterling–GBP</option>
                    <option value="UAH">Ukrainian Hryvnia–UAH</option>
                    <option value="UYU">Uruguayan Peso–UYU</option>
                    <option value="USD">US Dollar–USD</option>
                    <option value="UZS">Uzbekistan Sum–UZS</option>
                    <option value="VEB">Venezuelan Bolivar–VEB</option>
                    <option value="VND">Vietnamese Dong–VND</option>
                    <option value="XOF">West African CFA franc–XOF</option>
                    <option value="YER">Yemeni Rial–YER</option>
                    <option value="ZMW">Zambian Kwacha–ZMW</option>
                    <option value="ZWD">Zimbabwe Dollar–ZWD</option>
                  </optgroup>
                </select>
              </div>
            </div>
            <div>
              <label for="modal-settings-currency-placement" class="type-body-bold">
                Currency Placement
              </label>
              <div class="x-select-container">
                <select class="js-x-select" id="modal-settings-currency-placement">
                  <!---->
                  <option value="Symbol First">
                    Before amount (
                    <bdi>$</bdi>
                    123,456.78)
                  </option>
                  <option value="Symbol Last">
                    After amount (123,456.78
                    <bdi>$</bdi>
                    )
                  </option>
                  <option value="Symbol None">
                    Don't show (123,456.78)
                  </option>
                </select>
              </div>
            </div>
          </div>
          <label for="modal-settings-currency-format" class="type-body-bold">
            Number Format
          </label>
          <div class="x-select-container  ">
            <select class="js-x-select" id="modal-settings-currency-format">
              <!---->
              <option value="123,456.78">
                123,456.78
              </option>
              <option value="123.456,78">
                123.456,78
              </option>
              <option value="123,456.789">
                123,456.789
              </option>
              <option value="123 456.78">
                123 456.78
              </option>
              <option value="123'456.78">
                123'456.78
              </option>
              <option value="123.456">
                123.456
              </option>
              <option value="123,456">
                123,456
              </option>
              <option value="123 456-78">
                123 456-78
              </option>
              <option value="123 456,78">
                123 456,78
              </option>
              <option value="123,456/78">
                123,456/78
              </option>
              <option value="123 456">
                123 456
              </option>
              <option value="1,23,456.78">
                1,23,456.78
              </option>
            </select>
          </div>
          <label for="modal-settings-date-format" class="type-body-bold">
            Date Format
          </label>
          <div class="x-select-container  ">
            <select class="js-x-select" id="modal-settings-date-format">
              <!---->
              <option value="YYYY/MM/DD">
                2024/12/30
              </option>
              <option value="YYYY-MM-DD">
                2024-12-30
              </option>
              <option value="DD-MM-YYYY">
                30-12-2024
              </option>
              <option value="DD/MM/YYYY">
                30/12/2024
              </option>
              <option value="DD.MM.YYYY">
                30.12.2024
              </option>
              <option value="MM/DD/YYYY">
                12/30/2024
              </option>
              <option value="YYYY.MM.DD">
                2024.12.30
              </option>
            </select>
          </div>
        </form>
      </section>
      <!---->
    </div>
    <div class="modal-fresh-footer">
      <button class="ynab-button secondary" type="button">
        Cancel
      </button>
      <button class="ynab-button primary" type="button">
        Create Budget
      </button>
    </div>
    <!---->
  </div>
</div>
@push('scripts')
  <script>
    //Ajusta el left y top del modal
    function centrarModal() {
      const modal = document.querySelector('.modal-fresh .modal');
      const {innerWidth: width, innerHeight: height} = window;
      const modalWidth = modal.offsetWidth;
      const modalHeight = modal.offsetHeight;

      modal.style.left = `${(width - modalWidth) / 2}px`;
      modal.style.top = `${(height - modalHeight) / 2}px`;
    }

    window.addEventListener('resize', centrarModal);
    window.addEventListener('load', centrarModal);
    document.addEventListener('DOMContentLoaded', centrarModal);
    <!---->
    //activa el focus a los select
    document.addEventListener('DOMContentLoaded', () => {
      const selectElements = document.querySelectorAll('.js-x-select');

      selectElements.forEach(selectElement => {
        const container = selectElement.closest('.x-select-container');

        if (container) {
          selectElement.addEventListener('focus', () => {
            container.classList.add('focused');
          });

          selectElement.addEventListener('blur', () => {
            container.classList.remove('focused');
          });
        }
      });
    });
    // cierra el modal
    document.addEventListener('DOMContentLoaded', () => {
      const cancelBtn = document.querySelector('.secondary')
      const modalOverlay = document.getElementById('ember150');

      cancelBtn.addEventListener('click', () => {
        modalOverlay.classList.remove('modal-overlay','active'); // Cierra el modal del menú
      });
    });

  </script>
@endpush

