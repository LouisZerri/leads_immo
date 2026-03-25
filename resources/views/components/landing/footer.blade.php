<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            {{-- Identité --}}
            <div>
                <span class="font-serif font-bold text-xl text-blanc mb-3 block">GEST'IMMO</span>
                <p class="text-sm leading-relaxed">
                    30 Rue Joseph Bonnet<br>
                    33100 Bordeaux
                </p>
                <a href="tel:0649505250" class="text-or hover:text-or-light transition mt-2 inline-block font-semibold">
                    06 49 50 52 50
                </a>
                <br>
                <a href="mailto:contact@gestimmo-presta.fr" class="text-sm hover:text-blanc transition">
                    contact@gestimmo-presta.fr
                </a>
            </div>

            {{-- Liens légaux --}}
            <div>
                <h4 class="font-semibold text-blanc mb-3">Informations légales</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="https://www.gestimmo-france.fr/mentions-legales" target="_blank" rel="noopener" class="hover:text-blanc transition">Mentions légales</a></li>
                    <li><a href="https://www.gestimmo-france.fr/confidentialite" target="_blank" rel="noopener" class="hover:text-blanc transition">Politique de confidentialité</a></li>
                    <li><a href="/conditions-generales" class="hover:text-blanc transition">Conditions générales</a></li>
                </ul>
            </div>

            {{-- Garanties --}}
            <div>
                <h4 class="font-semibold text-blanc mb-3">Garanties</h4>
                <ul class="space-y-2 text-sm">
                    <li>SARL au capital de 1 000 €</li>
                    <li>SIRET : 990 877 417 00016</li>
                    <li>Carte pro CPI : CPI 1901 2025 000 000 011</li>
                    <li>Garantie financière : 120 000 € — GALIAN SMABTP</li>
                    <li>RCP : GALIAN SMABTP</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-gray-500">
            <p>&copy; {{ date('Y') }} GEST'IMMO — Tous droits réservés</p>
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-vert-valid" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    Site sécurisé HTTPS
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-vert-valid" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    Conforme RGPD
                </span>
            </div>
        </div>
    </div>
</footer>
