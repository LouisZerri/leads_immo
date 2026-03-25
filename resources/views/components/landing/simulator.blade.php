@props([
    'ctaText' => 'Parler à un conseiller',
    'pageSource' => 'P3',
])

<section id="simulator" class="py-16" style="background-color: #F2F0E8; scroll-margin-top: 80px">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-center mb-4" style="color: var(--color-primary)">
            Simulez votre rendement locatif
        </h2>
        <p class="text-gray-500 text-center mb-10">Calculez votre cashflow en temps réel et estimez la rentabilité de votre investissement.</p>

        <div x-data="simulator" class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
            <div class="grid md:grid-cols-2 gap-8">

                {{-- Champs de saisie --}}
                <div class="space-y-5">
                    <h3 class="font-bold text-gray-800 text-lg mb-2">Votre projet</h3>

                    {{-- Prix d'achat --}}
                    <div>
                        <label class="flex items-center justify-between text-sm font-medium text-gray-700 mb-2">
                            <span>Prix d'achat du bien</span>
                            <span class="font-bold" style="color: var(--color-primary)" x-text="formatEuro(prixAchat)"></span>
                        </label>
                        <input
                            type="range"
                            x-model.number="prixAchat"
                            min="50000"
                            max="600000"
                            step="5000"
                            class="simulator-slider w-full h-2 rounded-lg cursor-pointer"
                        >
                        <div class="flex justify-between text-xs text-gray-400 mt-1">
                            <span>50 000 €</span>
                            <span>600 000 €</span>
                        </div>
                    </div>

                    {{-- Loyer mensuel --}}
                    <div>
                        <label for="loyer" class="block text-sm font-medium text-gray-700 mb-1">Loyer mensuel estimé</label>
                        <div class="relative">
                            <input
                                type="number"
                                id="loyer"
                                x-model.number="loyerMensuel"
                                min="0"
                                step="50"
                                class="w-full px-4 py-3 rounded-lg outline-none text-gray-900 bg-white pr-16" style="border: 1px solid #d1d5db"
                            >
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none">€/mois</span>
                        </div>
                    </div>

                    {{-- Charges mensuelles --}}
                    <div>
                        <label for="charges" class="block text-sm font-medium text-gray-700 mb-1">Charges mensuelles (copro, taxe, gestion)</label>
                        <div class="relative">
                            <input
                                type="number"
                                id="charges"
                                x-model.number="chargesMensuelles"
                                min="0"
                                step="10"
                                class="w-full px-4 py-3 rounded-lg outline-none text-gray-900 bg-white pr-16" style="border: 1px solid #d1d5db"
                            >
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none">€/mois</span>
                        </div>
                    </div>

                    {{-- Durée du crédit --}}
                    <div>
                        <label for="duree" class="block text-sm font-medium text-gray-700 mb-1">Durée du crédit</label>
                        <select
                            id="duree"
                            x-model.number="dureeCredit"
                            class="w-full px-4 py-3 rounded-lg outline-none text-gray-900 bg-white" style="border: 1px solid #d1d5db"
                        >
                            <option value="10">10 ans</option>
                            <option value="15">15 ans</option>
                            <option value="20">20 ans</option>
                            <option value="25">25 ans</option>
                        </select>
                    </div>

                    {{-- Taux d'intérêt --}}
                    <div>
                        <label for="taux" class="block text-sm font-medium text-gray-700 mb-1">Taux d'intérêt</label>
                        <div class="relative">
                            <input
                                type="number"
                                id="taux"
                                x-model.number="tauxInteret"
                                min="0"
                                max="10"
                                step="0.1"
                                class="w-full px-4 py-3 rounded-lg outline-none text-gray-900 bg-white pr-10" style="border: 1px solid #d1d5db"
                            >
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm pointer-events-none">%</span>
                        </div>
                    </div>

                    {{-- Régime fiscal --}}
                    <div>
                        <label for="regime" class="block text-sm font-medium text-gray-700 mb-1">Régime fiscal</label>
                        <select
                            id="regime"
                            x-model="regimeFiscal"
                            class="w-full px-4 py-3 rounded-lg outline-none text-gray-900 bg-white" style="border: 1px solid #d1d5db"
                        >
                            <option value="lmnp">LMNP (Loueur Meublé Non Professionnel)</option>
                            <option value="nue">Location nue (micro-foncier)</option>
                            <option value="sci">SCI à l'IS</option>
                        </select>
                    </div>
                </div>

                {{-- Résultats --}}
                <div>
                    <h3 class="font-bold text-gray-800 text-lg mb-4">Vos résultats</h3>

                    <div class="space-y-4">
                        {{-- Rendement brut --}}
                        <div style="background-color: #f3f4f6" class="rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Rendement brut</span>
                                <span class="text-xl font-bold" style="color: var(--color-primary)" x-text="rendementBrut + ' %'"></span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">(Loyer annuel / Prix d'achat) × 100</p>
                        </div>

                        {{-- Rendement net --}}
                        <div style="background-color: #f3f4f6" class="rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Rendement net</span>
                                <span class="text-xl font-bold" style="color: var(--color-primary)" x-text="rendementNet + ' %'"></span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Après charges et vacance locative (1 mois/an)</p>
                        </div>

                        {{-- Cashflow mensuel --}}
                        <div
                            class="rounded-xl p-4"
                            :style="cashflowPositif ? 'background-color: rgba(39, 174, 96, 0.1)' : 'background-color: rgba(192, 57, 43, 0.1)'"
                        >
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Cashflow mensuel net</span>
                                <span
                                    class="text-2xl font-bold"
                                    :style="cashflowPositif ? 'color: #27AE60' : 'color: #C0392B'"
                                    x-text="cashflowMensuel + ' €'"
                                ></span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Loyer - mensualité crédit - charges</p>
                        </div>

                        {{-- Mensualité crédit --}}
                        <div style="background-color: #f3f4f6" class="rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Mensualité de crédit</span>
                                <span class="text-lg font-bold text-gray-800" x-text="formatEuro(mensualiteCredit)"></span>
                            </div>
                        </div>

                        {{-- Économie fiscale --}}
                        <div style="background-color: rgba(201, 168, 76, 0.1)" class="rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">Économie fiscale estimée / an</span>
                                <span class="text-xl font-bold" style="color: #A88A3A" x-text="formatEuro(economieFiscale)"></span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1" x-text="'Régime : ' + regimeFiscalLabel"></p>
                        </div>
                    </div>

                    {{-- CTA contextuel --}}
                    <div class="mt-6 p-5 rounded-xl text-center" style="border: 2px solid #C9A84C; background-color: rgba(201, 168, 76, 0.05)">
                        <p class="text-sm text-gray-700 mb-3">
                            <template x-if="cashflowPositif">
                                <span>
                                    Votre simulation montre un cashflow de <strong style="color: #27AE60" x-text="cashflowMensuel + '€/mois'"></strong>.
                                </span>
                            </template>
                            <template x-if="!cashflowPositif">
                                <span>Optimisons ensemble ce projet pour atteindre un cashflow positif.</span>
                            </template>
                            <br>Parlez à un conseiller pour optimiser ce résultat.
                        </p>
                        <a
                            href="#lead-form"
                            class="inline-block py-3 px-8 text-white font-bold rounded-lg transition duration-200 text-lg"
                            style="background-color: #C9A84C"
                            onmouseover="this.style.backgroundColor='#A88A3A'"
                            onmouseout="this.style.backgroundColor='#C9A84C'"
                        >
                            {{ $ctaText }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
