<?php

namespace Espo\Modules\Mattermost\Controllers;

use Espo\Core\{
    Api\Request,
    Exceptions\BadRequest
};
use stdClass;

class User extends \Espo\Controllers\User
{
    /**
     * @throws BadRequest
     */
    public function getActionForceMattermostSync(Request $request): stdClass
    {
        $id = $request->getQueryParam('id');

        if (empty($id)) {
            throw new BadRequest('Missing ID.');
        }

        $token = $this->getRecordService()->forceMattermostSync($id);

        return (object)[
            'token' => $token,
        ];
    }
}
