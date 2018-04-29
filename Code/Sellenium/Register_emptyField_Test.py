import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys


class Register_emptyField_Test(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_search_in_python_org(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        name = driver.find_elements_by_id("name")[0]
        family_name = driver.find_elements_by_id("family")[0]
        email = driver.find_elements_by_id("email")[0]
        national_id = driver.find_elements_by_id("person_id")[0]
        username = driver.find_elements_by_id("username")[0]
        password = driver.find_elements_by_id("password")[0]
        repass = driver.find_elements_by_id("repass")[0]
        cellphone_number = driver.find_elements_by_id("cellphone")[0]
        address = driver.find_elements_by_id("address")[0]
        captcha = driver.find_elements_by_id("captcha")[0]
        submit = driver.find_elements_by_id("submit")[0]

        # empty name
        family_name.send_keys("feyzabadisani")  # family name
        email.send_keys("smjfas@gmail.com")  # email
        national_id.send_keys("0123456789")  # national id
        username.send_keys("smjfas")  # username
        password.send_keys("hello123")  # pass
        repass.send_keys("hello123")  # repass
        cellphone_number.send_keys("09398604014")  # cellnum
        address.send_keys("10th number baker street")  # address
        captcha.send_keys("778536")  # captcha

        submit.click()

    #
    # @staticmethod
    # def empty_name(args):
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_family_name(args):
    #     args[0].send_keys("smj")  # name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_email(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_national_id(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_username(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_pass(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_repass(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_cellnum(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[8].send_keys("10th number baker street")  # address
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_address(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[9].send_keys("778536")  # captcha
    #     return args
    #
    # @staticmethod
    # def empty_captcha(args):
    #     args[0].send_keys("smj")  # name
    #     args[1].send_keys("feyzabadisani")  # family name
    #     args[2].send_keys("smjfas@gmail.com")  # email
    #     args[3].send_keys("0123456789")  # national id
    #     args[4].send_keys("smjfas")  # username
    #     args[5].send_keys("hello123")  # pass
    #     args[6].send_keys("hello123")  # repass
    #     args[7].send_keys("09398604014")  # cellnum
    #     args[8].send_keys("10th number baker street")  # address
    #     return args

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
