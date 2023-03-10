<?php

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZF2Themes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * @author Stanimir Dimitrov <stanimirdim92@gmail.com>
 */
class IndexController extends AbstractActionController
{
    /**
     * @var array
     */
    private $themesConfig = [];

    /**
     * @var mixed
     */
    private $reloadService = null;

    /**
     * @method __construct
     *
     * @param array $themesConfig
     * @param mixed $reloadService
     */
    public function __construct(array $themesConfig = [], $reloadService)
    {
        $this->themesConfig = $themesConfig;
        $this->reloadService = $reloadService;
    }

    /**
     * This action shows the list of all themes.
     *
     * @method indexAction
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $filename = __DIR__.'/../../../config/module.config.php';
            $settings = include $filename;
            $themeName = $request->getPost()['themeName'];
            $settings['theme']['name'] = $themeName;
            file_put_contents($filename, '<?php return '.var_export($settings, true).';');
            $this->reloadService->reload();
        }

        return new ViewModel([
            'themes' => $this->themesConfig,
        ]);
    }
}
