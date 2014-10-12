$(document).ready(function(){
	// Select
	$('.selectpicker').selectpicker();
	
	// Tags
	$("#tags").tags({
      suggestions: ["alpha", "bravo", "charlie", "delta", "echo", "foxtrot", "golf", "hotel", "india"],
      tagData: ["juliett", "kilo"]
    });

	// Editable
	$('.editable').editable();

	// Wizard
	$('#rootwizard').bootstrapWizard();

    // Mask
    if ($('[data-mask]')
        .length) {
        $('[data-mask]')
            .each(function () {

                $this = $(this);
                var mask = $this.attr('data-mask') || 'error...',
                    mask_placeholder = $this.attr('data-mask-placeholder') || 'X';

                $this.mask(mask, {
                    placeholder: mask_placeholder
                });
            })
    }
});