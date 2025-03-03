<?php
namespace src\services\dashboard;

use AnkorFramework\App\Validate\Validator;

use src\repositories\dashboard\DashBoardRoleRepository;


class DashBoardRoleService
{
    private $roleRepository;

    public function __construct(DashBoardRoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function getRoleCBO(): array
    {
        return $this->roleRepository->find("id, name");
    }

}