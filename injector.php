<?php
class midgardmvc_project_template_injector
{
    public function inject_template(midgardmvc_core_request $request)
    {

        // Inject the component into template chain to allow styling
        $mvc = midgardmvc_core::get_instance();
        $component = $mvc->component->get('midgardmvc_project_template');
        $request->add_component_to_chain($component, true);
    }
}
