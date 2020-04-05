<?php
/**
 * Class QRAuthenticatorTest
 *
 * @filesource   QRAuthenticatorTest.php
 * @created      24.12.2017
 * @package      chillerlan\QRCodeTest\Traits
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\QRCodeTest\Traits;

use chillerlan\QRCode\Traits\QRAuthenticator;
use chillerlan\QRCodeTest\QRTestAbstract;

class QRAuthenticatorTest extends QRTestAbstract{
	use QRAuthenticator;

	protected function setUp(){}

	public function testGetURI(){
		$this->authenticatorSecret = 'SECRETTEST234567';

		$expected = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAIAAACx0UUtAAAABnRSTlMA/wD/AP83WBt9AAAFgElEQVR4nO3dzU7tOBCF0abV7//K3MkdZeBW5L/vwFpTIAmwZZ1SOeWv7+/vfyDs39sPAP9DRqmTUepklDoZpU5GqZNR6mSUOhmlTkapk1HqZJQ6GaVORqmTUepklDoZpU5GqZNR6v6b+eGvr69VzzH2eOlqfN9Xb2g9LvXqRuP7Hrvy+JvHbv0HX7GOUiej1MkodTJK3VTN9LBwnMTCz/KvKoyZQufVz878rfaN7Wj+B62j1MkodTJKnYxSt7Jmephppey777FSZqb8WtiUmnHrvg/WUepklDoZpU5GqdtYMx2zb1NcZOvaTDmysCi8xTpKnYxSJ6PUySh1H1kzzRRJ46Jh5ptf/ey+l64eX/3EIunBOkqdjFIno9TJKHUba6Z9n9Zn2j8zVdHDuHZZ2KN6VX59xItTr1hHqZNR6mSUOhmlbmXNdGwn20NkYN3Cpzr21Ydb/8Ex6yh1MkqdjFIno9R9RXoJx0ReUYrMGv8I1lHqZJQ6GaVORqnbeD7TvqJh4WMs3Nj2am/evt7YjH2P4XwmfjIZpU5GqZNR6jb2mY4NX9jn2KSGGQuHmr+60fhSC39f6yh1MkqdjFIno9Rdm5t37PiihYO6xxZ2ZY797MI3pR4WFoXWUepklDoZpU5GqTs3N2/fx/PxfR+O3ejY/IiHhbP+bm0RfLCOUiej1MkodTJKXeV8plcfz29t5Nt3o1dnLO1rwu3rb9mbx08mo9TJKHUySt3U+0z7ZkDcOttp4fazY321sVu9Invz+EVklDoZpU5GqVs5A+LYKLzxpRbOvvsB8xSOjcLTZ+L3klHqZJQ6GaVu5d68mTJo30f7VwXHsTrg2Ny8VzdaWI0tZB2lTkapk1HqZJS6jX2mYwPrHo4NXzj21fFDPtzafbevhLKOUiej1MkodTJK3cb3mR4i4+zG9x1fat8euRm3zoUaP8aDvXn8ZDJKnYxSJ6PUbdybN55jPTYzGe/YZrzmGIvxYzTPDh6zjlIno9TJKHUySt21WeP79qq9enFqbGH5daz9c2xf37F6yzpKnYxSJ6PUySh1UzXTsRbOvgbPwnOhFp4pNePYZDwzIOAvGaVORqmTUeqmaqaFvYSF5ciMY2dKzRQcx+qtW4/xYB2lTkapk1HqZJS6jXvzZhoex4bOLZxi/srMRIyxfX/nV8zN4xeRUepklDoZpW7j3rxjU/Vm3Dq19pVIZXNrBIZ1lDoZpU5GqZNR6jaezzR2axfc+FLHhprvG2e3b9jErbaTdZQ6GaVORqmTUepWns90bL/ZsabUrVJm3xtazUkcY9ZR6mSUOhmlTkap23im7bE6YMa+84r2dbCOFSu3Dhp+sI5SJ6PUySh1Mkrdyr15t9w6W3YsUtmMv3lsX4/qFesodTJKnYxSJ6PUbZyb9xFdmYWPMb7Uw8Jtb/v6eZFi1DpKnYxSJ6PUySh1H9lnurVnbN8I8H0vXR0bWz6mz8RPJqPUySh1Mkpd5UzbsXFnZfzNYzMdnfGlbg0kXHg+09i+/taDdZQ6GaVORqmTUepW7s07ViXs6yQdazu9uvI++/44C1lHqZNR6mSUOhmlLvo+0yvjhse4spmZrr2w4Dg21HymGjtWyT1YR6mTUepklDoZpW5jzbRP85WdffXWw75+z8JBeQtZR6mTUepklDoZpe4ja6axhYPyZsqghR2dhYfJ7ntjaV8lZx2lTkapk1HqZJS6jTXTvg/RtzaJPewbTP6qdHtlYTPsWAllHaVORqmTUepklLqVNdOtUmbfJrFjUw+axcpMu8uZtvwiMkqdjFIno9R95PlM/CrWUepklDoZpU5GqZNR6mSUOhmlTkapk1HqZJQ6GaVORqmTUepklDoZpU5GqZNR6mSUOhml7g8cUKnnQ7fywQAAAABJRU5ErkJggg==';

		// PHP >= 7.2 produces different PNGs???
		if(PHP_MINOR_VERSION >= 2){
			$expected = 'data:image/png;base64,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';
		}

		$this->assertSame($expected, $this->getURIQRCode('testlabel', 'example.com'));
	}

}
