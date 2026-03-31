@extends('layouts.minimal')

@section('title', "Conditions Générales d'Utilisation")
@section('meta')
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<div class="max-w-3xl mx-auto py-10 px-5">
    <a href="/" class="text-sm text-gray-400 hover:text-gray-600 transition mb-6 inline-block" style="text-decoration: none;">← Retour</a>

    <div class="bg-white rounded-2xl shadow-sm p-8 md:p-10">
        <h1 class="font-sans text-2xl md:text-3xl font-bold mb-8" style="color: #1A3A5C">
            Conditions Générales d'Utilisation
        </h1>

        <p class="text-sm text-gray-400 mb-6">Dernière mise à jour : {{ date('d/m/Y') }}</p>

        <div class="text-sm text-gray-600 leading-relaxed space-y-6">
            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">1. Objet</h2>
                <p>Les présentes Conditions Générales d'Utilisation (CGU) ont pour objet de définir les modalités d'accès et d'utilisation du site internet exploité par la société GEST'IMMO, SARL au capital de 1 000 €, immatriculée au RCS de Brive sous le numéro 990 877 417, dont le siège social est situé au 30 Rue Joseph Bonnet, 33100 Bordeaux.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">2. Accès au site</h2>
                <p>Le site est accessible gratuitement à tout utilisateur disposant d'un accès à Internet. L'ensemble des frais liés à l'accès au site sont à la charge exclusive de l'utilisateur.</p>
                <p class="mt-2">GEST'IMMO se réserve le droit de suspendre, modifier ou interrompre l'accès au site à tout moment, sans préavis ni indemnité.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">3. Services proposés</h2>
                <p>Le site propose des services d'information et de mise en relation dans le domaine immobilier :</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <li>État des lieux professionnel</li>
                    <li>Accompagnement en cas de litige sur un état des lieux</li>
                    <li>Conseil en investissement locatif</li>
                    <li>Conseil en défiscalisation immobilière</li>
                </ul>
                <p class="mt-2">Les formulaires de contact présents sur le site permettent à l'utilisateur de soumettre une demande d'information ou de rappel. Cette soumission ne constitue pas un engagement contractuel de la part de GEST'IMMO.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">4. Simulateur de rendement locatif</h2>
                <p>Le simulateur de cashflow proposé sur le site fournit des estimations à titre indicatif uniquement. Les résultats ne constituent en aucun cas un conseil en investissement ou une garantie de rendement.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">5. Propriété intellectuelle</h2>
                <p>L'ensemble des éléments du site est la propriété exclusive de GEST'IMMO ou de ses partenaires. Toute reproduction totale ou partielle est strictement interdite sans autorisation écrite préalable.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">6. Données personnelles</h2>
                <p>La collecte et le traitement des données personnelles sont effectués conformément au RGPD et à la loi Informatique et Libertés. Consultez notre <a href="https://www.gestimmo-france.fr/confidentialite" target="_blank" rel="noopener" style="color: #C9A84C; text-decoration: underline;">Politique de confidentialité</a>.</p>
                <p class="mt-2">Les données collectées via les formulaires sont utilisées exclusivement pour répondre à la demande de l'utilisateur et ne sont jamais revendues à des tiers.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">7. Cookies</h2>
                <p>Le site utilise des cookies nécessaires à son fonctionnement et des cookies d'analyse et publicitaires soumis au consentement de l'utilisateur via le bandeau affiché lors de sa première visite.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">8. Responsabilité</h2>
                <p>GEST'IMMO s'efforce de fournir des informations exactes et à jour. Toutefois, la société ne saurait être tenue responsable des erreurs ou omissions. L'utilisateur est seul responsable de l'usage qu'il fait des contenus et services du site.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">9. Liens externes</h2>
                <p>Le site peut contenir des liens vers des sites tiers. GEST'IMMO décline toute responsabilité quant à leur contenu.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">10. Droit applicable</h2>
                <p>Les présentes CGU sont soumises au droit français. Les tribunaux compétents de Bordeaux seront seuls compétents en cas de litige.</p>
            </section>

            <section>
                <h2 class="text-lg font-bold mb-2" style="color: #1A3A5C">11. Contact</h2>
                <ul class="space-y-1">
                    <li>GEST'IMMO — SARL au capital de 1 000 €</li>
                    <li>30 Rue Joseph Bonnet, 33100 Bordeaux</li>
                    <li>SIRET : 990 877 417 00016</li>
                    <li>Email : <a href="mailto:contact@gestimmo-presta.fr" style="color: #C9A84C;">contact@gestimmo-presta.fr</a></li>
                    <li>Téléphone : <a href="tel:0649505250" style="color: #C9A84C;">06 49 50 52 50</a></li>
                </ul>
            </section>
        </div>
    </div>
</div>
@endsection
