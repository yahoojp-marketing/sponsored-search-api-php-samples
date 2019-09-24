<?php

namespace Jp\YahooApis\SS\V201909\CampaignCriterion;

class NegativeCampaignCriterion extends CampaignCriterion
{

    /**
     * @param CampaignCriterionUse $criterionUse
     * @param Criterion $criterion
     */
    public function __construct($criterionUse, $criterion)
    {
      parent::__construct($criterionUse, $criterion);
    }

}
