<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $sort = 0;

        $highlights = [
            ['question' => 'What does Shabakkat do?', 'answer' => 'Shabakkat provides end-to-end telecommunications and ICT solutions. We help clients plan, build, integrate, operate, monitor, optimize, maintain, and secure critical communications infrastructure — from network rollout and managed services to power systems, cybersecurity, and technical resourcing.'],
            ['question' => "What are Shabakkat's managed services?", 'answer' => 'Our managed services can include 24/7 network monitoring, NOC operations, fault management, field maintenance, back-office support, performance reporting, preventive maintenance, incident escalation, root-cause analysis, and service optimization.'],
            ['question' => 'Does Shabakkat offer cybersecurity services?', 'answer' => "Yes. Shabakkat's cybersecurity capabilities can include security assessment, network-security architecture, security hardening, monitoring, risk identification, managed-security support, and integration of security technologies."],
            ['question' => 'Can Shabakkat customize its services?', 'answer' => "Yes. Services are structured around each client's network, operational model, priorities, budget, regulatory environment, and service-level requirements — as an individual work package or one integrated engagement."],
            ['question' => 'How can we begin a project with Shabakkat?', 'answer' => 'Submit an inquiry through the website or contact the Shabakkat team directly. After reviewing the request, the appropriate technical and commercial teams will contact you to clarify the scope and agree on next steps.'],
        ];

        foreach ($highlights as $item) {
            Faq::updateOrCreate(
                ['question' => $item['question'], 'category' => 'Highlights'],
                ['answer' => $item['answer'], 'is_highlight' => true, 'sort_order' => $sort++],
            );
        }

        $categories = [
            'Company & Coverage' => [
                ['question' => 'What does Shabakkat do?', 'answer' => 'Shabakkat provides end-to-end telecommunications and ICT solutions. We help clients plan, build, integrate, operate, monitor, optimize, maintain, and secure critical communications infrastructure. Our capabilities include network rollout, managed services, NOC and back-office operations, fiber deployment, radio optimization, turnkey site construction, power systems, cybersecurity, revenue assurance, consultancy, technical resourcing, and telecom equipment supply.'],
                ['question' => 'Who does Shabakkat work with?', 'answer' => 'We work with telecommunications operators, network equipment vendors, tower and infrastructure companies, enterprises, and government organizations. Our services can be delivered as complete turnkey programs, individual technical work packages, managed-service agreements, or specialist consultancy engagements.'],
                ['question' => 'Where does Shabakkat operate?', 'answer' => 'Shabakkat is headquartered in Kuwait and has experience delivering projects across the Middle East and Africa. Project availability depends on the required service, location, technical scope, resource requirements, and applicable local regulations.'],
            ],
            'Network Delivery & Technology' => [
                ['question' => 'Does Shabakkat provide complete turnkey telecom solutions?', 'answer' => "Yes. Shabakkat can manage a telecom infrastructure project from initial planning and site assessment through procurement, civil works, installation, integration, testing, commissioning, acceptance, and handover. The exact scope is customized according to the client's technical and commercial requirements."],
                ['question' => 'Which mobile-network technologies does Shabakkat support?', 'answer' => 'Our teams have experience across multiple generations of mobile and fixed-network technologies, including legacy networks, 3G, 4G, fiber infrastructure, IP transport, VoLTE, and modern 5G environments. Technology support is evaluated according to the network architecture, equipment vendors, project location, and required scope.'],
                ['question' => 'Does Shabakkat support multi-vendor networks?', 'answer' => 'Yes. Shabakkat has experience working in multi-vendor environments across radio, core, transmission, IP, OSS, BSS, power, and passive infrastructure. Our teams can coordinate multiple technologies and vendors under a unified operational or project-management framework.'],
                ['question' => 'Does Shabakkat provide network planning and optimization?', 'answer' => 'Yes. Our capabilities include radio and transmission planning, capacity assessment, performance analysis, drive testing, benchmarking, parameter optimization, coverage analysis, quality-of-service improvement, and customer-experience assessment. Recommendations are developed using network measurements, configuration information, operational KPIs, and client objectives.'],
                ['question' => 'What is a radio network audit?', 'answer' => 'A radio network audit evaluates network coverage, quality, capacity, configuration, performance, and customer experience. The audit can combine drive-test information, network statistics, configuration data, fault information, and competitive benchmarking to identify problems and prioritize improvements.'],
                ['question' => 'Does Shabakkat build fiber networks?', 'answer' => 'Yes. Shabakkat can support outside-plant and in-building fiber infrastructure, fiber installation, blowing, splicing, migration, OTDR testing, transmission infrastructure, POP sites, and related civil works. The final scope depends on the network design and project environment.'],
                ['question' => 'Does Shabakkat construct complete telecom sites?', 'answer' => 'Yes. Our turnkey site capabilities can include site surveys, foundations, towers, monopoles, shelters, fencing, cabling, earthing, lightning protection, power systems, cooling, fuel systems, equipment installation, testing, acceptance, and handover. Both greenfield and rooftop requirements can be evaluated.'],
            ],
            'Managed Operations' => [
                ['question' => "What are Shabakkat's managed services?", 'answer' => 'Our managed services can include 24/7 network monitoring, NOC operations, fault management, field maintenance, back-office support, performance reporting, preventive maintenance, incident escalation, root-cause analysis, and service optimization. The service can cover a specific network domain or a broader end-to-end operational scope.'],
                ['question' => 'Can Shabakkat operate a Network Operations Centre?', 'answer' => 'Yes. Shabakkat can provide NOC and back-office services for monitoring alarms, managing incidents, tracking network performance, escalating faults, producing operational reports, and coordinating field teams. Support can be structured for single-vendor or multi-vendor network environments.'],
                ['question' => 'Does Shabakkat provide field maintenance?', 'answer' => 'Yes. Field-maintenance services may include preventive maintenance, corrective maintenance, site access coordination, fault resolution, spare-parts handling, power-system maintenance, equipment replacement, and operational reporting. Service coverage and response targets are defined according to the agreed service-level agreement.'],
            ],
            'Power, Equipment & Infrastructure' => [
                ['question' => 'Does Shabakkat supply and maintain generators?', 'answer' => 'Yes. Shabakkat provides power solutions for critical telecom infrastructure, including generator supply, installation, preventive maintenance, corrective maintenance, power integration, and related technical support. Hybrid and alternative-power requirements can also be evaluated according to project needs.'],
                ['question' => 'Does Shabakkat provide battery solutions?', 'answer' => 'Yes. Battery services can include supply, warehousing, transportation, installation, testing, commissioning, monitoring-system integration, replacement, and responsible handling of removed batteries. All work should follow applicable safety and environmental procedures.'],
                ['question' => 'Does Shabakkat supply telecom equipment?', 'answer' => 'Yes. Shabakkat can support the sourcing and delivery of active, passive, fiber, microwave, radio, power, battery, cabinet, spare-part, and infrastructure equipment. Equipment availability depends on technical specifications, approved manufacturers, quantities, location, and delivery requirements.'],
            ],
            'Enterprise ICT & Security' => [
                ['question' => 'Does Shabakkat provide enterprise ICT solutions?', 'answer' => "Shabakkat can support enterprise connectivity and ICT infrastructure, including LAN and WAN environments, structured cabling, fiber connectivity, network monitoring, data infrastructure, systems integration, and security solutions. The offered scope is tailored to the organization's operational, availability, security, and scalability requirements."],
                ['question' => 'Does Shabakkat offer cybersecurity services?', 'answer' => "Yes. Shabakkat's cybersecurity capabilities can include security assessment, network-security architecture, security hardening, monitoring, risk identification, managed-security support, and integration of security technologies. A detailed assessment is conducted before recommending a specific security solution."],
                ['question' => 'Does Shabakkat provide revenue-assurance services?', 'answer' => 'Yes. Revenue-assurance services can support billing, charging, BSS, IN, and value-added-service environments. The objective is to identify revenue leakage, validate charging accuracy, improve controls, and protect revenue throughout the subscriber and service lifecycle.'],
            ],
            'People, Projects & Flexibility' => [
                ['question' => 'Can Shabakkat provide engineers and technical specialists?', 'answer' => "Yes. Shabakkat can provide individual specialists or complete project teams across engineering, operations, project management, NOC, field maintenance, optimization, consultancy, and other technical disciplines. Resource profiles, experience levels, deployment models, and duration are agreed according to the client's requirements."],
                ['question' => 'Does Shabakkat provide project and vendor management?', 'answer' => 'Yes. Shabakkat can manage complex multi-vendor and multi-technology projects through project planning, governance, risk management, quality management, vendor coordination, contract support, reporting, and stakeholder communication.'],
                ['question' => 'Can Shabakkat support an existing network rather than build a new one?', 'answer' => 'Yes. Our services can be applied to existing networks through audits, modernization, expansion, optimization, managed operations, maintenance, equipment replacement, capacity upgrades, and performance improvement.'],
                ['question' => 'Can Shabakkat customize its services?', 'answer' => "Yes. Services are structured around each client's network, operational model, priorities, budget, regulatory environment, and service-level requirements. Shabakkat can provide an individual work package or combine multiple services into one integrated engagement."],
            ],
            'Getting Started' => [
                ['question' => 'What information is needed to request a proposal?', 'answer' => 'To prepare an initial response, please provide your organization and country, project location, required service, existing network or infrastructure details, expected scope and deliverables, preferred project start, required completion target, relevant technical documents or RFP, and contact details for follow-up. Additional information may be requested after the initial technical review.'],
                ['question' => 'How can we begin a project with Shabakkat?', 'answer' => 'Submit an inquiry through the website or contact the Shabakkat team directly. After reviewing the request, the appropriate technical and commercial teams will contact you to clarify the scope, understand the project requirements, and agree on the next steps.'],
                ['question' => 'Does Shabakkat offer career opportunities?', 'answer' => 'Shabakkat recruits professionals across telecommunications, ICT, engineering, project management, operations, field services, cybersecurity, and business functions. Available opportunities should be published through the official Careers page or approved Shabakkat recruitment channels.'],
                ['question' => 'How can suppliers or technology partners contact Shabakkat?', 'answer' => 'Suppliers and technology partners can submit a partnership inquiry describing their organization, products, regional coverage, certifications, references, and proposed area of cooperation. The submission will be directed to the relevant commercial, procurement, or technical team.'],
            ],
        ];

        foreach ($categories as $category => $items) {
            foreach ($items as $item) {
                Faq::updateOrCreate(
                    ['question' => $item['question'], 'category' => $category],
                    ['answer' => $item['answer'], 'is_highlight' => false, 'sort_order' => $sort++],
                );
            }
        }
    }
}
